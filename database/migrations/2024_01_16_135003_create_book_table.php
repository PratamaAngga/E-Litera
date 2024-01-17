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
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('gambar');
            $table->string('judul');
            $table->string('kode_buku');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('jumlah_buku');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
