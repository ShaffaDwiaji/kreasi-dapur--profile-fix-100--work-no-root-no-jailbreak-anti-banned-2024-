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
        @if(auth()->user()->hasRole('admin'))
            <!-- Konten yang hanya bisa dilihat oleh admin -->
            <h1>Edit Resep</h1>

            <!-- Tombol Kembali -->
            <a href="{{ route('menus.index') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
            <!-- Form untuk update menu -->
            <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Input untuk judul -->
                <div class="form-group">
                    <label for="judul">Judul Resep</label>
                    <input type="text" id="judul" name="judul" placeholder="Masukkan judul resep" value="{{ old('judul', $menu->judul) }}" required>
                </div>
                
                <!-- Input untuk deskripsi -->
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Tambahkan deskripsi singkat tentang resep" rows="4" required>{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                </div>
                
                <!-- Input untuk daftar bahan -->
                <div class="form-group">
                    <label for="bahan">Daftar Bahan</label>
                    <textarea id="bahan" name="bahan" placeholder="Daftar bahan, pisahkan dengan koma" rows="5" required>{{ old('bahan', $menu->bahan) }}</textarea>
                </div>
                
                <!-- Input untuk langkah memasak -->
                <div class="form-group">
                    <label for="langkah">Langkah Memasak</label>
                    <textarea id="langkah" name="langkah" placeholder="Langkah memasak, pisahkan dengan nomor" rows="6" required>{{ old('langkah', $menu->langkah) }}</textarea>
                </div>
                
                <!-- Input untuk unggah gambar -->
                <div class="form-group">
                    <label for="gambar">Unggah Gambar</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                    <p>*biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>
                
                <!-- Tombol submit -->
                <button type="submit" class="btn">Update Resep</button>
            </form>
        @else
            <!-- Konten untuk pengguna selain admin -->
            <p>Anda tidak memiliki akses ke halaman ini.</p>
            
        @endif
    </div>
</body>
</html>
