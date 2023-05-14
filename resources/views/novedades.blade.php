<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;

$pelis = PeliculaController::obtenerNovedadesPelis(4, 1990);
$series = SerieController::obtenerNovedadesSeries(4,2015);
$libros = LibroController::obtenerNovedadesLibros(4, 1950);

?>



@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Novedades
@endsection

@section("activo_novedades")
activo
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <div class="novedades">

        <div class="pelis container-fluid py-5" id="novP">
            <h3 class="ms-5 mb-4">Películas</h3>

            <div class="flex">
                @foreach($pelis as $peli)
                <div class="col">
                    <div class="card text-center h-100">
                        <img src="<?php echo e(asset('images/pelis/' . $peli->imagen)) ?>" class="card-img-top" alt="poster de la película">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{$peli->titulo}}</h5>
                            <a href="pelicula/{{$peli->id_peli}}" class="btn">Saber más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="series container-fluid py-5" id="novS">
            <h3 class="ms-5 mb-4">Series</h3>

            <div class="flex">
                @foreach($series as $serie)
                <div class="col">
                    <div class="card text-center h-100">
                        <img src="<?php echo e(asset('images/series/' . $serie->imagen)) ?>" class="card-img-top" alt="poster de la serie">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{$serie->titulo}}</h5>
                            <a href="serie/{{$serie->id_serie}}" class="btn">Saber más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="series container-fluid py-5" id="novL">
            <h3 class="ms-5 mb-4">Libros</h3>

            <div class="flex">
                @foreach($libros as $libro)
                <div class="col">
                    <div class="card text-center h-100">
                        <img src="<?php echo e(asset('images/libros/' . $libro->imagen)) ?>" class="card-img-top" alt="portada del libro">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{$libro->titulo}}</h5>
                            <a href="libro/{{$libro->id_libro}}" class="btn">Saber más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
<!-- fin contenido -->
@endsection