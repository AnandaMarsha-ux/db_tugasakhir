@extends('layout.templateAdmin')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Data Pengunjung</h3>

    {{-- FORM INPUT --}}
    <form action="{{ route('pengunjung.store') }}" method="POST" class="mb-4">
        @csrf

        <div class="mb-2">
            <label>Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Tujuan Kunjungan</label>
            <input type="text" name="tujuan_kunjungan" class="form-control" required>
        </div>

        <button class="btn btn-primary mt-2">Simpan</button>
    </form>

    {{-- TABEL --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengunjung</th>
                        <th>Tujuan Kunjungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($pengunjung as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pengunjung }}</td>
                        <td>{{ $item->tujuan_kunjungan }}</td>
                        <td class="text-center">
                            <form action="{{ route('pengunjung.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data pengunjung belum ada
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
