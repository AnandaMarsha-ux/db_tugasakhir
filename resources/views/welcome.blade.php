@extends('layout.templateAdmin')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Data Manajemen Perpustakaan</h3>

    <!-- Tombol Tambah -->
    <a href="{{ route('perpustakaan.create') }}" class="btn btn-primary mb-3">
        Tambah Buku
    </a>

    <!-- Tabel -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Cover Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $item->cover) }}"
                                     width="70">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td class="text-center">{{ $item->tahun }}</td>
                            <td>{{ Str::limit($item->deskripsi, 100) }}</td>
                            <td class="text-center">
                                <a href="{{ route('perpustakaan.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Ubah
                                </a>

                                <form action="{{ route('perpustakaan.destroy', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus buku?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data buku belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
