<?php

// dd($pelicula);
// dd($pelicula->id_peli);

use App\Http\Controllers\Pelicula_ActorController;
use App\Http\Controllers\PeliculaController;
use App\Pelicula_Actor;

$nombreDirector = PeliculaController::obtenerDirectorPeli($pelicula->id_director);
$actores = Pelicula_ActorController::obtenerActoresPeli($pelicula->id_peli);
// dd($actores);

?>

@extends("plantilla")

@section("titulo_pagina")
BiblioLog - {{$pelicula->titulo}}
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <div class="ficha">
        <h3 class="titulo mb-3 mb-lg-5 text-lg-start">{{$pelicula->titulo}}</h3>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-3 mb-2 mb-md-4 mb-lg-0">
                <img src="<?php echo e(asset('images/pelis/' . $pelicula->imagen)) ?>" alt="poster de la película" class="mw-100 border rounded">
                @guest
                @else
                <div class="botones-biblioteca">
                    <a href="" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a>
                </div>
                @endguest
            </div>
            <div class="col-10 col-md-10 col-lg-8 mt-2 mt-md-4 mt-lg-0">
                <table class="table align-middle table-borderless">
                    <tr>
                        <th class="text-center">Título</th>
                        <td>{{$pelicula->titulo}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Año</th>
                        <td>{{$pelicula->year}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Duración</th>
                        <td>{{$pelicula->duracion}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">País</th>
                        <td>{{$pelicula->pais}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Dirección</th>
                        <td>{{$nombreDirector}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Reparto</th>
                        <td>{{ $actores }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Género</th>
                        <td>{{$pelicula->genero}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Sinopsis</th>
                        <td>{{$pelicula->sinopsis}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- fin contenido -->
@endsection