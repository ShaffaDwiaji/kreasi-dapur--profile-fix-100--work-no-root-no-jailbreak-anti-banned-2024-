<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Menus</title>
    <link rel="stylesheet" href="{{ asset('css/style6.css') }}">
</head>
<body>
    <div class="container">
        <h1>Daftar Menu yang Dihapus</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($menus->isEmpty())
            <p>Tidak ada menu yang telah dihapus.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->name }}</td>
                            <td>
                                <a href="{{ route('menus.restore', $menu->id) }}">Restore</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('menus.restoreAll') }}">Restore Semua Menu</a>
        @endif
        <a href="{{ route('menus.index') }}" class="btn">Kembali ke Daftar Menu</a>
    </div>
</body>
</html>
