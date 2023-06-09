<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoraController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\InsumosProductoController;

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

Route::get('/', [LoginController::class, 'show'])->name('login');
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login_post');

Route::get('/recuperar', [LoginController::class, 'form_forget'])->name('recuperar');
Route::post('/recuperar', [LoginController::class, 'forget'])->name('recuperar_email');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register_post');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::resource('proveedoras', ProveedoraController::class);
Route::resource('insumos_producto', InsumosProductoController::class);

Route::get('productos/pdf', [ProductoController::class, 'pdf']) -> name('productos.pdf');
Route::resource('productos', ProductoController::class);

Route::get('insumos/pdf', [InsumoController::class, 'pdf']) -> name('insumos.pdf');
Route::resource('insumos', InsumoController::class);

Route::get('libros/pdf_abiertas', [CompraController::class, 'pdf_abiertas']) -> name('compras.pdf_abiertas');
Route::get('libros/pdf_cerradas', [CompraController::class, 'pdf_cerradas']) -> name('compras.pdf_cerradas');
Route::resource('compras', CompraController::class);

Route::get('produccions/pdf', [ProduccionController::class, 'pdf']) -> name('produccions.pdf');
Route::resource('produccions', ProduccionController::class);
