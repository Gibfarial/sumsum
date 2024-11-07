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
        Schema::create('sheet1s', function (Blueprint $table) {
            $table->id(); // ini untuk primary key
            $table->string('no')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('merk_spesifikasi')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('harga_pasaran', 15, 2)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('status'); // Anda bisa menyesuaikan tipe data sesuai kebutuhan
            $table->timestamps(); // ini untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheet1s');
    }
};
