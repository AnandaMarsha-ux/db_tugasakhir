<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>

<h2>Registrasi Pengguna</h2>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="/login">Login</a></p>

</body>
</html>
