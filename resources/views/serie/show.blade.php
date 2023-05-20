<?php

// dd($serie);
// dd($serie->id_peli);
// dd($id);

use App\Http\Controllers\CapituloController;
use App\Http\Controllers\Serie_ActorController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TemporadaController;
use App\Serie_Actor;

$actores = Serie_ActorController::obtenerActoresSerie($id);
// dd($actores);
$temporadas = TemporadaController::obtenerTemporadaSerie($serie->id_serie);
// dd($temporadas[0]->id_temporada);
$temporadasAgain = TemporadaController::obtenerTemporadaSerie($serie->id_serie);

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

        <div class="row justify-content-center align-items-start mt-4">

            <div class="col-10 col-md-8 col-lg-3 mb-2 mb-md-4 mb-lg-0">
                @guest
                @else
                <div class="botones-biblioteca">
                    <a href="" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Siguiendo <i class="fa-regular fa-heart icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a>
                </div>
                @endguest
            </div>

            <div class="col-10 col-md-10 col-lg-8 capitulos">
                <div class="tab">
                    @foreach($temporadas as $temp)
                    <button class="tablinks btn boton-temporada" onclick="openTab(event, 'tab{{$temp->num_temporada}}')">Temporada {{$temp->num_temporada}}</button>
                    @endforeach
                </div>

                @foreach($temporadasAgain as $t)
                <div id="tab{{$t->num_temporada}}" class="tabcontent">
                    <?php $capitulos = CapituloController::obtenerCapituloTemporada($t->id_temporada); ?>
                    <ul class="lista-capitulos">
                        @foreach($capitulos as $cap)
                        <li>
                            <p>{{$cap->nombre_cap}}</p>
                            @guest
                            @else
                            <a href="" class="btn-lg check-capitulo"><i class="fa-solid fa-check icono"></i></a>
                            @endguest
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</div>
<!-- fin contenido -->

<!-- script js para el listado de capitulos -->
<script src="{{asset('js/tabSeries.js')}}"></script>

@endsection