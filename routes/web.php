<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

Route::get('/', [MenuController::class, 'dashboard'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard');

// Route untuk CRUD
Route::resource('menus', MenuController::class);

Route::get('/menus/{id}', function () {return view('menus.show');});

Route::get('/menus/postingresep', function () {return view('menus.create');});
Route::post('/menus/postingresep', [MenuController::class, 'menus.store']);

Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
Route::post('/menus/update/{id}', [MenuController::class, 'update'])->name('menus.update');

Route::post('/menus/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

// Soft Delete
Route::get('/menus/deleted', function () {
    $menus = Menu::onlyTrashed()->get();
    return view('menus.deleted', compact('menus'));
})->name('deleted');
Route::get('/menu/restore/{id}', [MenuController::class, 'restoreMenu'])->name('menus.restore');
Route::get('/menu/restore-all', [MenuController::class, 'restoreAllMenus'])->name('menus.restoreAll');
Route::delete('/menus/force-delete/{id}', [MenuController::class, 'forceDelete'])->name('menus.forceDelete');

// Membuat Admin
Route::get('/make-admin', [MenuController::class,'makeAdmin']);

require __DIR__.'/auth.php';