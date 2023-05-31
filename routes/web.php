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
// Ruta para mi biblioteca
Route::view("biblioteca", "biblioteca");
// Ruta para sobre bibliolog
Route::view("sobre-bibliolog", "sobre-bibliolog");


// Rutas autentificación
Auth::routes();


// Rutas para películas
Route::resource('peliculas', 'PeliculaController');
Route::get('/peliculas/{id}', 'PeliculaController@show');
// Ruta para buscador películas
Route::post('/peliculas', 'PeliculaController@buscar')->name('peliculas.buscar');
Route::get('/peliculas/genero/{genero}', 'PeliculaController@buscarPorGenero')->name('peliculas.buscarPorGenero');


// Rutas para series
Route::resource('series', 'SerieController');
Route::get('/series/{id}', 'SerieController@show');
// Ruta para buscador series
Route::post('/series', 'SerieController@buscar')->name('series.buscar');
Route::get('/series/genero/{genero}', 'SerieController@buscarPorGenero')->name('series.buscarPorGenero');


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


//Rutas para series pendientes
Route::resource('seriesPendientes', 'Usuario_Serie_PendienteController');
// Ruta propia para agregar y eliminar registro
Route::post('/series/{id}/borrada-pendiente', 'Usuario_Serie_PendienteController@borrar')->name('seriesPendientes.borrar');
Route::post('/series/{id}/pendiente', 'Usuario_Serie_PendienteController@store')->name('seriesPendientes.store');

//Rutas para series vistas
Route::resource('seriesVistas', 'Usuario_Serie_VistaController');
// Ruta propia para agregar y eliminar registro
Route::post('/series/{id}/borrada-vista', 'Usuario_Serie_VistaController@borrar')->name('seriesVistas.borrar');
Route::post('/series/{id}/vista', 'Usuario_Serie_VistaController@store')->name('seriesVistas.store');

//Rutas para series seguidas
Route::resource('seriesSeguidas', 'Usuario_Serie_SiguiendoController');
// Ruta propia para agregar y eliminar registro
Route::post('/series/{id}/borrada-siguiendo', 'Usuario_Serie_SiguiendoController@borrar')->name('seriesSeguidas.borrar');
Route::post('/series/{id}/seguida', 'Usuario_Serie_SiguiendoController@store')->name('seriesSeguidas.store');

//Rutas para capítulos vistos
Route::resource('capVistos', 'Usuario_Cap_VistoController');
// Ruta propia para agregar y eliminar registro
Route::post('/series/{id}/borrado-cap', 'Usuario_Cap_VistoController@borrar')->name('capVistos.borrar');
Route::post('/series/{id}/cap-visto', 'Usuario_Cap_VistoController@store')->name('capVistos.store');


// Proteger rutas si no hay sesión iniciada
// Route::get('biblioteca')->name('biblioteca')->middleware('auth');

