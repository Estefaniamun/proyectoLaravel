<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/producto', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->middleware(['auth', 'verified'])->name('producto.create');
Route::post('/producto/create', [ProductoController::class, 'store'])->middleware(['auth', 'verified'])->name('producto.store');
Route::get('/producto/show/{producto}', [ProductoController::class, 'show'])->middleware(['auth', 'verified'])->name('producto.show');
Route::put('/producto/edit', [Producto::class, 'update'])->middleware('auth', 'verified')->name('producto.edit');
Route::delete('/producto/delete/{producto}', 'ProductoController@destroy')->middleware(['auth', 'verified'])->name('producto.destroy');
Route::get('/usuario', [UsuarioController::class, 'index'])->middleware(['auth', 'verified'])->name('usuario.index');
Route::get('/usuario/create', [UsuarioController::class, 'create'])->middleware(['auth', 'verified'])->name('usuario.create');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
