<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
</head>
<body>
    <div class="container">
        <h1>Tambah Resep</h1>
        <!-- Pastikan form diarahkan ke route 'menu.store' -->
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input untuk judul -->
            <div class="form-group">
                <label for="judul">Judul Resep</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul resep" required>
            </div>
            
            <!-- Input untuk deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Tambahkan deskripsi singkat tentang resep" rows="4" required></textarea>
            </div>
            
            <!-- Input untuk daftar bahan -->
            <div class="form-group">
                <label for="bahan">Daftar Bahan</label>
                <textarea id="bahan" name="bahan" placeholder="Daftar bahan, pisahkan dengan koma" rows="5" required></textarea>
            </div>
            
            <!-- Input untuk langkah memasak -->
            <div class="form-group">
                <label for="langkah">Langkah Memasak</label>
                <textarea id="langkah" name="langkah" placeholder="Langkah memasak, pisahkan dengan nomor" rows="6" required></textarea>
            </div>
            
            <!-- Input untuk unggah gambar -->
            <div class="form-group">
                <label for="gambar">Unggah Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>
            
            <!-- Tombol submit -->
            <button type="submit" class="btn">Kirim Resep</button>
        </form>
    </div>
</body>
</html>
