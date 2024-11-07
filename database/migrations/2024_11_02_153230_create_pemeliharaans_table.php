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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id(); // ini untuk primary key
            $table->string('no')->nullable();
            $table->string('kategori')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('merek')->nullable();
            $table->integer('qty')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('jenis_pemeliharaan')->nullable();
            $table->text('hasil_pelaksanaan')->nullable();
            $table->integer('estimasi_biaya')->nullable();
            $table->timestamps(); // ini untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
