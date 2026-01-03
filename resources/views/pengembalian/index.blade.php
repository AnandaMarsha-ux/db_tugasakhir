<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengembalian Buku</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3 class="mb-4">Data Pengembalian Buku</h3>

    <!-- FORM -->
    <form action="{{ route('pengembalian.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="nama_peminjam" class="form-control" placeholder="Nama Peminjam" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" required>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal_pengembalian" class="form-control" required>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary wOptional">Simpan</button>
            </div>
        </div>
    </form>

    <!-- TABEL -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>
                            <form action="{{ route('pengembalian.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
