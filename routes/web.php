<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EditorialesController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\DevolucionesController;

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
    return view('welcome');
});

Auth::routes();
Route::get('libros/{libro}', [LibrosController::class, 'show'])->name('libros.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>['auth']],function(){
    Route::resource("roles",RolController::class);
    Route::resource("usuarios",UsuarioController::class);
    Route::resource("authors",AutoresController::class);
    Route::resource("categories",CategoriasController::class);
    Route::resource("publishers",EditorialesController::class);
    Route::resource("books",LibrosController::class);
    Route::resource("loans",PrestamosController::class);
    Route::resource("returns",DevolucionesController::class);
});
