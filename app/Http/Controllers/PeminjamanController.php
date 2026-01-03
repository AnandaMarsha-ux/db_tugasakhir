<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // TAMPILKAN FORM
    public function index()
    {
        return view('peminjaman.index');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'judul_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        // sementara tampilkan hasil (biar yakin berhasil)
        return redirect()->back()->with('success', 'Peminjaman berhasil disimpan');
    }
}
