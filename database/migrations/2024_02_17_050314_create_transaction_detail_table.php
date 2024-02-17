<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('transaction_header_id')->comment('Transaction Header Id Key');
            $table->string('document_code', 3)->comment('Kode Dokumen')->default('TRX');
            $table->string('document_number', 10)->comment('Nomor Dokumen');
            $table->string('product_code', 18)->comment('Kode Produk');
            $table->mediumInteger('price')->comment('Harga Jual Produk Dalam Satuan Currency');
            $table->mediumInteger('quantity')->comment('Jumlah qty barang yang dibeli');
            $table->string('unit', 5)->comment('Satuan Jual Produk');
            $table->integer('sub_total')->comment('Total Harga Jual per Item');
            $table->string('currency', 5)->comment('Satuan Harga');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_detail');
    }
};
