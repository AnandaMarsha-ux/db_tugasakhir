<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengembalian_buku', function (Blueprint $table) {
    $table->id();
    $table->string('nama_peminjam');
    $table->string('judul_buku');
    $table->date('tanggal_pengembalian');
    $table->timestamps(); 
});

    }

    public function down(): void
    {
        Schema::dropIfExists('pengembalian_buku');
    }
};
