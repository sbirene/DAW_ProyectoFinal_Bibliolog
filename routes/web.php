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

//Rutas para pelis pendientes
Route::resource('pelisPendientes', 'Usuario_Peli_PendienteController');
// Ruta propia para agregar y eliminar registro
Route::post('/peliculas/{id}/borrada-pendiente', 'Usuario_Peli_PendienteController@borrar')->name('pelisPendientes.borrar');
Route::post('/peliculas/{id}/pendiente', 'Usuario_Peli_PendienteController@store')->name('pelisPendientes.store');

//Rutas para pelis vistas
Route::resource('pelisVistas', 'Usuario_Peli_VistaController');
// Ruta propia para agregar y eliminar registro
Route::post('/peliculas/{id}/borrada-vista', 'Usuario_Peli_VistaController@borrar')->name('pelisVistas.borrar');
Route::post('/peliculas/{id}/vista', 'Usuario_Peli_VistaController@store')->name('pelisVistas.store');

//Rutas para libros pendientes
Route::resource('librosPendientes', 'Usuario_Libro_PendienteController');
// Ruta propia para agregar y eliminar registro
Route::post('/libros/{id}/borrado-pendiente', 'Usuario_Libro_PendienteController@borrar')->name('librosPendientes.borrar');
Route::post('/libros/{id}/pendiente', 'Usuario_Libro_PendienteController@store')->name('librosPendientes.store');

//Rutas para libros leídos
Route::resource('librosLeidos', 'Usuario_Libro_LeidoController');
// Ruta propia para agregar y eliminar registro
Route::post('/libros/{id}/borrado-leido', 'Usuario_Libro_LeidoController@borrar')->name('librosLeidos.borrar');
Route::post('/libros/{id}/leido', 'Usuario_Libro_LeidoController@store')->name('librosLeidos.store');

// Proteger rutas si no hay sesión iniciada
// Route::get('biblioteca')->name('biblioteca')->middleware('auth');

