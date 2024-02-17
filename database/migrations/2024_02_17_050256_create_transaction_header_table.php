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
        Schema::create('transaction_header', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('document_code', 3)->comment('Kode Dokumen')->default('TRX');
            $table->string('document_number', 10)->unique()->comment('Nomor Dokumen')->nullable();
            $table->integer('user_id')->comment('User Id Key');
            $table->string('user', 50)->comment('User Login');
            $table->integer('total')->comment('Total Harga Jual');
            $table->date('date')->comment('Tanggal Transaksi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_header');
    }
};
