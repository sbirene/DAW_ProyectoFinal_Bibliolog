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

// Rutas para películas
Route::resource('peliculas', 'PeliculaController');
Route::get('/peliculas/{id}', 'PeliculaController@show');
// Ruta para buscador películas
Route::post('/peliculas', 'PeliculaController@buscar')->name('peliculas.buscar');

// Rutas para series
Route::resource('series', 'SerieController');
Route::get('/series/{id}', 'SerieController@show');
// Ruta para buscador series
Route::post('/series', 'SerieController@buscar')->name('series.buscar');

// Rutas para libros
Route::resource('libros', 'LibroController');
Route::get('/libros/{id}', 'LibroController@show');
// Ruta para buscador libros
Route::post('/libros', 'LibroController@buscar')->name('libros.buscar');

// Proteger rutas si no hay sesión iniciada
// Route::get('biblioteca')->name('biblioteca')->middleware('auth');

