<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    // WAJIB karena nama tabel bukan jamak
    protected $table = 'pengunjung';
    public $timestamps = false;

    protected $fillable = [
        'nama_pengunjung',
        'tujuan_kunjungan',
    ];
}
