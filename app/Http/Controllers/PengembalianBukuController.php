<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengembalianBuku;

class PengembalianBukuController extends Controller
{
    public function index()
    {
        $data = PengembalianBuku::all();
        return view('pengembalian.index', compact('data'));
    }

    public function store(Request $request)
    {
        PengembalianBuku::create([
            'nama_peminjam' => $request->nama_peminjam,
            'judul_buku' => $request->judul_buku,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        PengembalianBuku::where('id', $id)->delete();
        return redirect()->back();
    }
}
