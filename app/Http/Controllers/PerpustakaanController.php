<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerpustakaanController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $buku = Buku::all();
        return view('perpustakaan.index', compact('buku'));
    }

    // FORM TAMBAH BUKU
    public function create()
    {
        return view('perpustakaan.create');
    }

    // SIMPAN DATA + COVER
    public function store(Request $request)
    {
        $data = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')
                                      ->store('cover-buku', 'public');
        }

        Buku::create($data);

        return redirect()->route('perpustakaan.index')
                         ->with('success', 'Buku berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('perpustakaan.edit', compact('buku'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $data = $request->only(['judul', 'penulis', 'deskripsi']);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')
                                      ->store('cover-buku', 'public');
        }

        $buku->update($data);

        return redirect()->route('perpustakaan.index')
                         ->with('success', 'Buku berhasil diperbarui');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();

        return redirect()->route('perpustakaan.index')
                         ->with('success', 'Buku berhasil dihapus');
    }
}
