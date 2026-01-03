<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengembalianBuku extends Model
{
    protected $table = 'pengembalian_buku';

    protected $fillable = [
        'nama_peminjam',
        'judul_buku',
        'tanggal_pengembalian'
    ];
}
