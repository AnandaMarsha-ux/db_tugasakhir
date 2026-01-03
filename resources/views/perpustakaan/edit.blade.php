@extends('layout.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Edit Buku</h3>

    <form action="{{ route('perpustakaan.update', $buku->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cover Buku</label><br>
            @if ($buku->cover)
                <img src="{{ asset('storage/'.$buku->cover) }}" width="100"><br><br>
            @endif
            <input type="file" name="cover" class="form-control">
        </div>

        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul"
                   value="{{ $buku->judul }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis"
                   value="{{ $buku->penulis }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
                      class="form-control"
                      required>{{ $buku->deskripsi }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('perpustakaan.index') }}"
           class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
