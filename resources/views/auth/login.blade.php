<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Mengatur karakter agar mendukung huruf dan simbol -->
    <meta charset="UTF-8">

    <!-- Membuat tampilan menyesuaikan ukuran layar perangkat -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul yang tampil pada tab browser -->
    <title>Login - Kedai Kopi Senja</title>
</head>

<body>

    <!-- Judul utama halaman login -->
    <h1>Kedai Kopi Senja</h1>

    <!-- Keterangan bahwa halaman ini digunakan staf -->
    <h2>Login Kasir dan Manajer</h2>

    <!-- Form untuk mengirim email dan password ke Laravel -->
    <form action="{{ url('/login') }}" method="POST">

        <!-- Token keamanan Laravel untuk melindungi form dari CSRF -->
        @csrf

        <!-- Bagian input email -->
        <div>

            <!-- Label atau keterangan untuk kolom email -->
            <label for="email">Email</label>

            <!-- Input untuk memasukkan email pengguna -->
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
            >

            <!-- Menampilkan pesan kesalahan jika email tidak valid -->
            @error('email')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <!-- Bagian input password -->
        <div>

            <!-- Label atau keterangan untuk kolom password -->
            <label for="password">Password</label>

            <!-- Input password yang menyamarkan karakter -->
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <!-- Menampilkan pesan kesalahan jika password bermasalah -->
            @error('password')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <!-- Tombol untuk mengirim data login -->
        <button type="submit">Login</button>

    </form>

</body>
</html>
