<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
        ]);

        $imagePath = $request->hasFile('gambar') 
            ? $request->file('gambar')->store('images', 'public') 
            : null;

        Menu::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
            'bahan' => $request->bahan,
            'langkah' => $request->langkah,
        ]);

        return redirect()->route('menus.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    public function show($menu)
    {
        $menu = Menu::findOrFail($menu);
        return view('menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
        ]);

        $menu = Menu::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $menu->gambar = $request->file('gambar')->store('images', 'public');
        }

        $menu->judul = $request->judul;
        $menu->deskripsi = $request->deskripsi;
        $menu->bahan = $request->bahan;
        $menu->langkah = $request->langkah;
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus gambar jika ada
        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }
        $menu->delete(); // Soft delete
        return redirect()->route('menus.index')->with('success', 'Resep berhasil dihapus!');
    }

    public function restore($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->restore(); // Restore data
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dikembalikan.');
    }

    // Restore menu yang sudah dihapus dengan ID
    public function restoreMenu($id)
    {
        $menu = Menu::onlyTrashed()->find($id);
        if ($menu) {
            $menu->restore();
            return redirect()->back()->with('success', 'Menu berhasil direstore.');
        } else {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }
    }

    // Restore semua menu yang sudah dihapus
    public function restoreAllMenus()
    {
        Menu::onlyTrashed()->restore();
        return redirect()->back()->with('success', 'Semua menu berhasil direstore.');
    }

    public function forceDelete($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->forceDelete(); // Hapus permanen
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus secara permanen.');
    }

    public function deleted()
    {
        $menus = Menu::onlyTrashed()->get();
        return view('menus.deleted', compact('menus'));
    }

    public function makeAdmin()
    {
        $user = User::findOrFail(1);

        $role = Role::firstOrCreate(['name' => 'admin']);

        $user->assignRole($role);
        
        return redirect()->back()->with('success', "User dengan ID 1 telah menjadi admin.");
    }
}
