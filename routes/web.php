<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});
//AuthController
Route::post('sesion',[AuthController::class,'login'])->name('sesion');
Route::get('login',[AuthController::class,'index'])->name('login');
Route::get('registrar',[AuthController::class,'registrar'])->name('registrar');
Route::post('signUp',[AuthController::class,'signUp'])->name('signUp');
Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('signout',[AuthController::class,'singOut'])->name('signout');

//CarritoController
Route::get('Detallepro/{id}',[CarritoController::class,'Detalle'])->name('Detalle');
Route::get('carrito',[CarritoController::class,'Carrito'])->name('carrito');
Route::post('addCarrito/{id}',[CarritoController::class,'addProductoCarrito'])->name('addProductoCarrito');
Route::delete('EliminarPro/{id}',[CarritoController::class,'destroy'])->name('destroy');

Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductosController::class);
