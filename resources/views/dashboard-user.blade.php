@extends('layout.templateAdmin')

@section('content')
<div class="container mt-4">

    <!-- JUDUL + TOMBOL TAMBAH -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Manajemen Perpustakaan</h3>

        <a href="{{ route('perpustakaan.create') }}" class="btn btn-primary">
            Tambah Buku
        </a>
    </div>

    <!-- CARD -->
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Cover Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($buku as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <!-- COVER -->
                        <td class="text-center">
                            @if ($item->cover)
                                <img src="{{ asset('storage/'.$item->cover) }}" width="70">
                            @else
                                <img src="https://via.placeholder.com/70" width="70">
                            @endif
                        </td>

                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->deskripsi }}</td>

                        <!-- AKSI -->
                        <td class="text-center">
                            <!-- EDIT -->
                            <a href="{{ route('perpustakaan.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- HAPUS -->
                            <form action="{{ route('perpustakaan.destroy', $item->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus buku ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
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
