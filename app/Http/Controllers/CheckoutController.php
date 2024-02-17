<?php

namespace App\Http\Controllers;

use App\Helpers\CurrentTimestamp;
use App\Helpers\CurrentUser;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::all();
        return view('checkout.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            DB::beginTransaction();

            $transaction_header_store = TransactionHeader::lockforUpdate()
                ->create([
                    'user_id' => CurrentUser::userId(),
                    'user' => CurrentUser::userData()->user,
                    'total' => $input['total_price_submit'],
                    'date' => CurrentTimestamp::getDate(),
                ]);

            if ($transaction_header_store) {

                if (strlen($transaction_header_store->id) == 1) {
                    $transaction_header_number = '0' . $transaction_header_store->id;
                }

                $transaction_header_update = TransactionHeader::where('id', $transaction_header_store->id)
                    ->update([
                        'document_number' => $transaction_header_number
                    ]);

                foreach ($input['product_code'] as $index => $product) {
                    $product_json = json_decode($product);

                    $transaction_detail_store = TransactionDetail::lockforUpdate()
                        ->create([
                            'transaction_header_id' => $transaction_header_store->id,
                            'document_number' => $transaction_header_number,
                            'product_code' => $product_json->product_code,
                            'price' => $product_json->price,
                            'quantity' => $input['qty_product'][$index],
                            'unit' => $product_json->unit,
                            'sub_total' => $input['total_price_item'][$index],
                            'currency' => $product_json->currency,
                        ]);
                }

                if ($transaction_header_update && $transaction_detail_store) {
                    DB::commit();
                    return redirect()->route('report.index')->with(['success' => 'Checkout successfully submited!']);
                } else {
                    DB::rollBack();
                    return redirect()->back()->with(['failed' => 'Checkout failed to submit!']);
                }
            } else {
                DB::rollBack();
                return redirect()->back()->with(['failed' => 'Checkout failed to submit!']);
            }

            foreach ($input['product_code'] as $index => $product) {
                $product_json = json_decode($product);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
