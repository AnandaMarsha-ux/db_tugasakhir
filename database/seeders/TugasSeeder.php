<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [[
        'gambarTugas' => 'gambar.png',
        'namaTugas' => 'Tugas Promnet Laravel',
        'deskripsiTugas' => 'lorem impsum color',
        'deadlineTugas' => now(),
    ],
];
        
        Tugas::insert($data);
    }
}
