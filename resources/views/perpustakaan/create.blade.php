@extends('layout.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Buku</h3>

    <form action="{{ route('perpustakaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Cover Buku</label>
            <input type="file" name="cover" class="form-control">
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('perpustakaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
