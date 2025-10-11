<h2>Register</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Alamat:</label><br>
    <input type="text" name="alamat" required><br><br>

    <label>No HP:</label><br>
    <input type="text" name="no_hp" required><br><br>

    <label>No KTP:</label><br>
    <input type="text" name="no_ktp" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password:</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? 
    <a href="{{ route('login') }}">Login</a>
</p>
