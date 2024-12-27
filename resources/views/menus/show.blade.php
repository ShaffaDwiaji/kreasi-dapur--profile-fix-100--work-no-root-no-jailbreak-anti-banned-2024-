<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep {{$menu->judul}}</title>
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="recipe-detail">
        @if ($menu)
        
        <div class="container">
            <!-- Tombol Kembali -->
            <a href="{{ route('menus.index') }}" class="btn back" style="display: inline-block; margin-bottom: 20px; text-decoration: none; color: white; font-size: 18px;">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>

            <!-- Judul dan Gambar -->
            <h1>{{ $menu->judul }}</h1>
            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->judul }}" class="recipe-image">

            <!-- Deskripsi -->
            <p class="description">
                {{ $menu->deskripsi }}
            </p>

            <!-- Bahan-Bahan -->
            <h2>Bahan-Bahan</h2>
            <ul>
                @foreach(explode(',', $menu->bahan) as $ingredient) <!-- Mengubah string menjadi array -->
                    <li>{{ trim($ingredient) }}</li> <!-- Menghapus spasi di sekitar bahan -->
                @endforeach
            </ul>

            <!-- Langkah-Langkah -->
            <h2>Cara Memasak</h2>
            <ol>
                @foreach(explode(',', $menu->langkah) as $instruction)
                    <li>{{ $instruction }}</li>
                @endforeach
            </ol>

            <!-- Tombol Aksi -->
            @if(auth()->check() && auth()->user()->hasRole('admin'))
            <div class="action-buttons">
                <!-- Tombol Edit -->
                <a href="{{ route('menus.edit', $menu->id) }}" class="btn edit">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <!-- Tombol Hapus -->
                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini?')">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
                <form action="{{ route('menus.forceDelete', $menu->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='btn delete' onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini secara permanen?')">Force Delete</button>
                </form>
                
            </div>
                @if($menu->trashed())
                    <!-- Tombol Restore -->
                    <form action="{{ route('menus.restore', $menu->id) }}" method="POST">
                        @csrf
                        <button type="submit">Restore</button>
                    </form>
                @endif
            @endif
        </div>
        @else
            <p>Menu tidak ditemukan.</p>
        @endif
    </section>
</body>
</html>
