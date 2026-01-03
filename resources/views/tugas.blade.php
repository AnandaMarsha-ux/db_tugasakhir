<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h4 class="mb-3">Data Tugas</h4>

    <!-- TABEL -->
    <table class="table table-bordered" id="tabelTugas">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Kantor</th>
                <th>Usia</th>
                <th>Tanggal Mulai</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tugas as $item)
            <tr>
                <td><input class="form-control form-control-sm" value="{{ $item->nama }}" disabled></td>
                <td><input class="form-control form-control-sm" value="{{ $item->jabatan }}" disabled></td>
                <td><input class="form-control form-control-sm" value="{{ $item->kantor }}" disabled></td>
                <td><input class="form-control form-control-sm" value="{{ $item->usia }}" disabled></td>
                <td><input type="date" class="form-control form-control-sm" value="{{ $item->tanggal_mulai }}" disabled></td>
                <td><input class="form-control form-control-sm" value="{{ $item->gaji }}" disabled></td>
                <td>
                    <button class="btn btn-warning btn-sm btn-edit">Edit</button>
                    <button class="btn btn-success btn-sm btn-simpan d-none">Simpan</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <button class="btn btn-primary mt-3" id="btnTambah">+ Tambah Data</button>

</div>

<script>
document.addEventListener('click', function(e){
    if(e.target.classList.contains('btn-edit')){
        let row = e.target.closest('tr');
        row.querySelectorAll('input').forEach(i => i.disabled = false);
        e.target.classList.add('d-none');
        row.querySelector('.btn-simpan').classList.remove('d-none');
    }

    if(e.target.classList.contains('btn-simpan')){
        let row = e.target.closest('tr');
        row.querySelectorAll('input').forEach(i => i.disabled = true);
        e.target.classList.add('d-none');
        row.querySelector('.btn-edit').classList.remove('d-none');
    }

    if(e.target.id === 'btnTambah'){
        let tbody = document.querySelector('#tabelTugas tbody');
        tbody.insertAdjacentHTML('beforeend', `
            <tr>
                <td><input class="form-control form-control-sm"></td>
                <td><input class="form-control form-control-sm"></td>
                <td><input class="form-control form-control-sm"></td>
                <td><input type="number" class="form-control form-control-sm"></td>
                <td><input type="date" class="form-control form-control-sm"></td>
                <td><input type="number" class="form-control form-control-sm"></td>
                <td><button class="btn btn-success btn-sm">Simpan</button></td>
            </tr>
        `);
    }
});
</script>

</body>
</html>
