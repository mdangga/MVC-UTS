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
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori');
            $table->timestamps();
        });
        Schema::create('pemasok', function (Blueprint $table) {
            $table->id('id_pemasok');
            $table->string('nama_pemasok');
            $table->string('kontak');
            $table->string('alamat');
            $table->timestamps();
        });
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->integer('stok');
            $table->integer('harga');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_pemasok');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->foreign('id_pemasok')->references('id_pemasok')->on('pemasok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('pemasok');
    }
};
