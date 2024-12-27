<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda
    protected $table = 'menus';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['judul', 'deskripsi', 'bahan', 'langkah'];

    // Mengizinkan pengaturan timestamps
    public $timestamps = true;
}
