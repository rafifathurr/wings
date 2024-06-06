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
        Schema::create('product', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('product_code', 18)->unique()->comment('Kode Produk');
            $table->string('product_name', 30)->comment('Nama Produk');
            $table->mediumInteger('price')->comment('Harga Jual Produk Dalam Satuan Currency');
            $table->string('currency', 5)->comment('Satuan Harga Jual');
            $table->decimal('discount', 6, 2)->comment('Diskon dalam (%)')->default(0.0);
            $table->string('dimension', 50)->comment('Dimensi Produk');
            $table->string('unit', 5)->comment('Satuan Jual Produk');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
