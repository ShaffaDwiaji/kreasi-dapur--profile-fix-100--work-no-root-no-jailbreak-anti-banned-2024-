<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Constructor kosong, karena tidak ada middleware
    public function __construct()
    {
        // Tidak ada middleware di sini
    }

    // Menampilkan daftar produk dengan filter, sorting, dan pagination
    public function index(Request $request)
    {
        $query = Menu::query();

        // Filter berdasarkan kategori jika ada
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Sorting berdasarkan parameter yang diberikan
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->get('sort_order', 'asc'));
        }

        // Pagination: 10 produk per halaman
        $menu = $query->paginate(10);

        return response()->json($menu);
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
           'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
        ]);

        // Membuat produk baru
        $menu = Menu::create($validated);

        return response()->json($menu, 201); // Kembalikan produk dengan status 201
    }

    // Mengupdate produk yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
           'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
        ]);

        // Cari produk berdasarkan ID atau gagal (404)
        $menu = Menu::findOrFail($id);
        $menu->update($validated);

        return response()->json($menu, 200); // Kembalikan produk yang sudah diupdate
    }

    // Menghapus produk berdasarkan ID
    public function destroy($id)
    {
        // Cari produk berdasarkan ID atau gagal (404)
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return response()->json(['message' => 'Product deleted'], 200); // Kembalikan pesan sukses
    }

    public function show($id)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        if ($user->hasRole('admin')) {
            // Logika untuk admin
            $menu = Menu::findOrFail($id);
            return response()->json($menu);
        }

        return response()->json(['error' => 'Access denied'], 403);
    }

    public function restore($id)
    {
        // Ambil pasien meskipun sudah di-soft delete
        $menu = Menu::withTrashed()->find($id);

        // Jika data tidak ditemukan
        if (!$menu) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Restore data pasien yang telah di-soft delete
        $menu->restore();

        return response()->json([
            'success' => true,
            'message' => 'Data pasien berhasil dipulihkan!',
            'data' => $menu
        ], 200);
    }

    public function restoreMenu($id)
    {
        $menu = Menu::onlyTrashed()->findOrFail($id);
        $menu->restore();

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil direstore',
            'data' => $menu,
        ]);
    }

    public function restoreAllMenus()
    {
        $restored = Menu::onlyTrashed()->restore();

        return response()->json([
            'success' => true,
            'message' => "Semua menu yang dihapus berhasil direstore ($restored item)",
        ]);
    }
}