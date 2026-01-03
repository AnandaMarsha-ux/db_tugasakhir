<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = Pengunjung::all();
        return view('pengunjung.index', compact('pengunjung'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'tujuan_kunjungan' => 'required',
        ]);

        Pengunjung::create($request->only([
            'nama_pengunjung',
            'tujuan_kunjungan'
        ]));

        return redirect()->route('pengunjung.index')
            ->with('success', 'Data pengunjung berhasil disimpan');
    }

    public function destroy($id)
    {
        Pengunjung::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
