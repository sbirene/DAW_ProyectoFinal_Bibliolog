<?php

// dd($serie);
// dd($serie->id_peli);
// dd($id);

use App\Http\Controllers\Serie_ActorController;
use App\Http\Controllers\SerieController;
use App\Serie_Actor;

$actores = Serie_ActorController::obtenerActoresSerie($id);
// dd($actores);

?>

@extends("plantilla")

@section("titulo_pagina")
BiblioLog - {{$serie->titulo}}
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <div class="ficha">
        <h3 class="titulo mb-3 mb-lg-5 text-lg-start">{{$serie->titulo}}</h3>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-3 mb-2 mb-md-4 mb-lg-0">
                <img src="<?php echo e(asset('images/series/' . $serie->imagen)) ?>" alt="poster de la película" class="mw-100 border rounded">
            </div>
            <div class="col-10 col-md-10 col-lg-8 mt-2 mt-md-4 mt-lg-0">
                <table class="table align-middle table-borderless">
                    <tr>
                        <th class="text-center">Título</th>
                        <td>{{$serie->titulo}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Año</th>
                        <td>{{$serie->year}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">País</th>
                        <td>{{$serie->pais}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Reparto</th>
                        <td>{{ $actores }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Género</th>
                        <td>{{$serie->genero}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Sinopsis</th>
                        <td>{{$serie->sinopsis}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-3 mb-2 mb-md-4 mb-lg-0">
                @guest
                @else
                <div class="botones-biblioteca-serie">
                    <a href="" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Siguiendo <i class="fa-regular fa-heart icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a>
                </div>
                @endguest
            </div>
            <div class="col-10 col-md-10 col-lg-8 mt-2 mt-md-4 mt-lg-0">
                <h3>Aquí iran las temporadas y capítulos</h3>
            </div>
        </div>
    </div>

</div>
<!-- fin contenido -->
@endsection