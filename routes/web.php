<?php

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

use App\Http\Controllers\AutorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta para index
Route::get('/', function () {
    return view('index');
});

// Ruta para el index
Route::view("index", "index");
// Ruta para novedades
Route::view("novedades", "novedades");


// Rutas autentificación
Auth::routes();


// Proteger rutas si no hay sesión iniciada
// Route::get('biblioteca')->name('biblioteca')->middleware('auth');

