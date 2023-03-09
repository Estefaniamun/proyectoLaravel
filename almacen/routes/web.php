<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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



//Rutas de producto
Route::get('/producto', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->middleware(['auth', 'verified'])->name('producto.create');
Route::post('/producto/create', [ProductoController::class, 'store'])->middleware(['auth', 'verified'])->name('producto.store');
Route::get('/producto/show/{id}', [ProductoController::class, 'show'])->middleware(['auth', 'verified'])->name('productos.show');
Route::get('/producto/edit/{id}', 'ProductoController@edit')->middleware('auth', 'verified')->name('producto.edit');
Route::put('/producto/edit/{id}', 'ProductoController@update')->middleware('auth', 'verified')->name('productos.update');
Route::delete('/producto/delete/{producto}', 'ProductoController@destroy')->middleware(['auth', 'verified'])->name('producto.destroy');

//Rutas de usuario
Route::get('/usuario', [UsuarioController::class, 'index'])->middleware(['auth', 'verified'])->name('usuario.index');
Route::get('/usuario/show/{id}', [UsuarioController::class, 'show'])->middleware('auth', 'verified')->middleware('admin')->name('usuario.show');
Route::get('/usuario/edit/{id}', 'UsuarioController@edit')->middleware('auth', 'verified')->middleware('admin')->name('usuario.edit');
Route::put('/usuario/edit/{id}', 'UsuarioController@update')->middleware('auth', 'verified')->middleware('admin')->name('usuario.update');
Route::delete('/usuario/delete/{usuario}', 'UsuarioController@destroy')->middleware('auth', 'verified')->middleware('admin')->name('usuario.destroy');

//Rutas de compra
Route::get('/compra', [CompraController::class, 'index'])->middleware(['auth', 'verified'])->name('compra.index');
Route::get('/compra/create', [CompraController::class, 'create'])->middleware(['auth', 'verified'])->name('compra.create');
Route::post('/compra/create', [CompraController::class, 'store'])->middleware(['auth', 'verified'])->name('compra.store');
Route::get('/compra/show/{id}', [CompraController::class, 'show'])->middleware(['auth', 'verified'])->name('compra.show');
Route::get('/compra/edit/{id}', 'CompraController@edit')->middleware('auth', 'verified')->name('compra.edit');
Route::put('/compra/edit/{id}', 'CompraController@update')->middleware('auth', 'verified')->name('compra.update');
Route::delete('/compra/delete/{id}', [CompraController::class, 'destroy'])->middleware(['auth', 'verified'])->name('compra.destroy');


Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Ruta verificacion email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
require __DIR__.'/auth.php';
