<?php

// dd($serie);
// dd($serie->id_peli);
// dd($id);

use App\Http\Controllers\CapituloController;
use App\Http\Controllers\Serie_ActorController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\Usuario_Cap_VistoController;
use App\Http\Controllers\Usuario_Serie_PendienteController;
use App\Http\Controllers\Usuario_Serie_SiguiendoController;
use App\Http\Controllers\Usuario_Serie_VistaController;
use App\Serie_Actor;
use Illuminate\Support\Facades\Auth;


$actores = Serie_ActorController::obtenerActoresSerie($id);
// dd($actores);
$temporadas = TemporadaController::obtenerTemporadaSerie($serie->id_serie);
// dd($temporadas[0]->id_temporada);
$temporadasAgain = TemporadaController::obtenerTemporadaSerie($serie->id_serie);

if (Auth::user() != null) {
    $pendiente = Usuario_Serie_PendienteController::comprobarPendiente(Auth::user()->id, $serie->id_serie);
    $vista = Usuario_Serie_VistaController::comprobarVista(Auth::user()->id, $serie->id_serie);
    $siguiendo = Usuario_Serie_SiguiendoController::comprobarSiguiendo(Auth::user()->id, $serie->id_serie);
}

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
                    @if($vista == false)
                    <form action="{{route('seriesVistas.store', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('seriesVistas.borrar', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                        @csrf
                        <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Vista <i class="fa-solid fa-check icono"></i></i></button>
                    </form>
                    @endif

                    @if($siguiendo == false)
                    <form action="{{route('seriesSeguidas.store', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Siguiendo <i class="fa-regular fa-heart icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('seriesSeguidas.borrar', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                        @csrf
                        <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Siguiendo <i class="fa-regular fa-heart icono"></i></button>
                    </form>
                    @endif

                    @if($pendiente == false)
                    <form action="{{route('seriesPendientes.store', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('seriesPendientes.borrar', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                        @csrf
                        <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Pendiente <i class="fa-regular fa-clock icono"></i></button>
                    </form>
                    @endif

                    <!-- <a href="" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Siguiendo <i class="fa-regular fa-heart icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a> -->
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
                            <?php $visto = Usuario_Cap_VistoController::comprobarVisto(Auth::user()->id, $cap->id_cap) ?>

                            @if($visto == false)
                            <form action="{{route('capVistos.store', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                                @csrf
                                @method("POST")
                                <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                                <input type="hidden" name="cap" value="{{$cap->id_cap}}">
                                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                                <button type="submit" class=""><i class="fa-solid fa-check fa-xl icono"></i></button>
                            </form>
                            <!-- <a href="" class="btn-lg check-capitulo"><i class="fa-solid fa-check icono"></i></a> -->
                            @else
                            <form action="{{route('capVistos.borrar', ['id' => $serie->id_serie])}}" method="post" class="w-fit">
                                @csrf
                                <input type="hidden" name="serie" value="{{$serie->id_serie}}">
                                <input type="hidden" name="cap" value="{{$cap->id_cap}}">
                                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                                <button type="submit" class="marcado"><i class="fa-solid fa-check fa-xl icono"></i></button>
                            </form>
                            <!-- <a href="" class="btn-lg check-capitulo marcado"><i class="fa-solid fa-check icono"></i></a> -->
                            @endif
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