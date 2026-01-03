<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = [
        'nama',
        'jabatan',
        'kantor',
        'usia',
        'tanggal_mulai',
        'gaji'
    ];
}
