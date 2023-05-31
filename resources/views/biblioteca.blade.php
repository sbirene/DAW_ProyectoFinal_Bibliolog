<?php

use App\Http\Controllers\CapituloController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\Usuario_Cap_VistoController;
use App\Http\Controllers\Usuario_Libro_LeidoController;
use App\Http\Controllers\Usuario_Libro_PendienteController;
use App\Http\Controllers\Usuario_Peli_PendienteController;
use App\Http\Controllers\Usuario_Peli_VistaController;
use App\Http\Controllers\Usuario_Serie_PendienteController;
use App\Http\Controllers\Usuario_Serie_SiguiendoController;
use App\Http\Controllers\Usuario_Serie_VistaController;
use Illuminate\Support\Facades\Auth;

if (Auth::user() != null) {
    $usuario = Auth::user();
    // dd($usuario->id);

    $pelisP = Usuario_Peli_PendienteController::pelisPendientes($usuario->id);
    // dd($pelisP);
    $pelisV = Usuario_Peli_VistaController::pelisVistas($usuario->id);
    // dd($pelisV);
    $librosP = Usuario_Libro_PendienteController::librosPendientes($usuario->id);
    $librosV = Usuario_Libro_LeidoController::librosLeidos($usuario->id);
    $seriesS = Usuario_Serie_SiguiendoController::seriesSeguidas($usuario->id);
    $seriesP = Usuario_Serie_PendienteController::seriesPendientes($usuario->id);
    $seriesV = Usuario_Serie_VistaController::seriesVistas($usuario->id);

    // Para estadísticas
    $totalP = Usuario_Peli_VistaController::totalPelisVistas($usuario->id);
    $totalMinP = PeliculaController::totalMinutosVistos($usuario->id);
    $totalCaps = Usuario_Cap_VistoController::totalCapsVistos($usuario->id);
    $totalMinCaps = CapituloController::totalMinutosVistos($usuario->id);
    $totalL = Usuario_Libro_LeidoController::totalLibrosLeidos($usuario->id);
    $totalPags = LibroController::totalPagsLeidas($usuario->id);
}


?>



@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Mi biblioteca
@endsection

@section("activo_biblioteca")
activo
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">
    <div class="listado">
        @guest
        <div class="aviso">
            <h1>Inicia sesión para acceder a tu biblioteca</h1>
            <h2>¿No tienes cuenta? ¡A qué esperas! ¡Empieza ya!</h2>
            <a href="/novedades" class="btn btn-lg">Ver las novedades</a>
        </div>
        @else
        <h3>Bienvenido a tu biblioteca, {{$usuario->name}}</h3>

        <div class="biblioteca">

            <div class="tab">
                <button class="tablinks btn" onclick="openTab(event, 'tabPelis')">Películas</button>
                <button class="tablinks btn" onclick="openTab(event, 'tabSeries')">Series</button>
                <button class="tablinks btn" onclick="openTab(event, 'tabLibros')">Libros</button>
            </div>

            <div id="tabPelis" class="tabcontent">
                <div class="primero">
                    <h3 class="">Pendientes <i class="fa-regular fa-clock icono"></i></h3>
                    <div class="flex">
                        @foreach($pelisP as $peli)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/pelis/' . $peli->imagen)) ?>" class="card-img-top" alt="poster de la película">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$peli->titulo}}</h5>
                                    <a href="/peliculas/{{$peli->id_peli}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <h3 class="">Vistas <i class="fa-solid fa-check icono"></i></h3>
                    <div class="flex">
                        @foreach($pelisV as $peli)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/pelis/' . $peli->imagen)) ?>" class="card-img-top" alt="poster de la película">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$peli->titulo}}</h5>
                                    <a href="/peliculas/{{$peli->id_peli}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <div class="tab">
                        <button class="tablinksDos btn" onclick="openTabDos(event, 'tabEstadsPelis')">Ver mis estadísticas</button>
                    </div>
                    <div id="tabEstadsPelis" class="tabcontentDos">
                        <h5>Has visto un total de {{ $totalP }} películas este año. Lo que hacen un total de {{ $totalMinP }} minutos.</h5>
                    </div>
                </div>
            </div>

            <div id="tabSeries" class="tabcontent">
                <div class="primero">
                    <h3 class="">Siguiendo <i class="fa-regular fa-heart icono"></i></h3>
                    <div class="flex">
                        @foreach($seriesS as $serie)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/series/' . $serie->imagen)) ?>" class="card-img-top" alt="poster de la serie">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$serie->titulo}}</h5>
                                    <a href="/series/{{$serie->id_serie}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <h3 class="">Pendientes <i class="fa-regular fa-clock icono"></i></h3>
                    <div class="flex">
                        @foreach($seriesP as $serie)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/series/' . $serie->imagen)) ?>" class="card-img-top" alt="poster de la serie">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$serie->titulo}}</h5>
                                    <a href="/series/{{$serie->id_serie}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <h3 class="">Vistas <i class="fa-solid fa-check icono"></i></h3>
                    <div class="flex">
                        @foreach($seriesV as $serie)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/series/' . $serie->imagen)) ?>" class="card-img-top" alt="poster de la serie">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$serie->titulo}}</h5>
                                    <a href="/series/{{$serie->id_serie}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <div class="tab">
                        <button class="tablinksDos btn" onclick="openTabDos(event, 'tabEstadsCaps')">Ver mis estadísticas</button>
                    </div>
                    <div id="tabEstadsCaps" class="tabcontentDos">
                        <h5>Has visto un total de {{ $totalCaps }} capítulos este año. Lo que hacen un total de {{ $totalMinCaps }} minutos.</h5>
                    </div>
                </div>
            </div>

            <div id="tabLibros" class="tabcontent">
                <div class="primero">
                    <h3 class="">Pendientes <i class="fa-regular fa-clock icono"></i></h3>
                    <div class="flex">
                        @foreach($librosP as $libro)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/libros/' . $libro->imagen)) ?>" class="card-img-top" alt="poster de la película">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$libro->titulo}}</h5>
                                    <a href="/libros/{{$libro->id_libro}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <h3 class="">Leídos <i class="fa-solid fa-check icono"></i></h3>
                    <div class="flex">
                        @foreach($librosV as $libro)
                        <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                            <div class="card text-center h-100">
                                <img src="<?php echo e(asset('images/libros/' . $libro->imagen)) ?>" class="card-img-top" alt="poster de la película">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{$libro->titulo}}</h5>
                                    <a href="/libros/{{$libro->id_libro}}" class="btn">Saber más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="despues">
                    <div class="tab">
                        <button class="tablinksDos btn" onclick="openTabDos(event, 'tabEstadsLibros')">Ver mis estadísticas</button>
                    </div>
                    <div id="tabEstadsLibros" class="tabcontentDos">
                        <h5>Has leído un total de {{ $totalL }} libros este año. Lo que hacen un total de {{ $totalPags }} páginas leídas.</h5>
                    </div>
                </div>
            </div>

        </div>
        @endguest
    </div>
</div>
<!-- fin contenido -->

<!-- script js para el listado de capitulos -->
<script src="{{asset('js/tabBiblioteca.js')}}"></script>
@endsection