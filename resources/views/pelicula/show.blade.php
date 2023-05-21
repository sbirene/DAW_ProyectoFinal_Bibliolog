<?php

// dd($pelicula);
// dd($pelicula->id_peli);

use App\Http\Controllers\Pelicula_ActorController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\Usuario_Peli_PendienteController;
use App\Http\Controllers\Usuario_Peli_VistaController;
use App\Pelicula_Actor;
use App\Usuario_Peli_Pendiente;
use Illuminate\Support\Facades\Auth;

$nombreDirector = PeliculaController::obtenerDirectorPeli($pelicula->id_director);
$actores = Pelicula_ActorController::obtenerActoresPeli($pelicula->id_peli);
// dd($actores);

$pendiente = Usuario_Peli_PendienteController::comprobarPendiente(Auth::user()->id, $pelicula->id_peli);
// dd($pendiente);
$vista = Usuario_Peli_VistaController::comprobarVista(Auth::user()->id, $pelicula->id_peli);

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

                    @if($vista == false)
                    <form action="{{route('pelisVistas.store', ['id' => $pelicula->id_peli])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="peli" value="{{$pelicula->id_peli}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('pelisVistas.borrar', ['id' => $pelicula->id_peli])}}" method="post" class="w-fit">
                        @csrf
                        <input type="hidden" name="peli" value="{{$pelicula->id_peli}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Vista <i class="fa-solid fa-check icono"></i></i></button>
                    </form>
                    @endif

                    @if($pendiente == false)
                    <form action="{{route('pelisPendientes.store', ['id' => $pelicula->id_peli])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="peli" value="{{$pelicula->id_peli}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('pelisPendientes.borrar', ['id' => $pelicula->id_peli])}}" method="post" class="w-fit">
                        @csrf
                        <input type="hidden" name="peli" value="{{$pelicula->id_peli}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Pendiente <i class="fa-regular fa-clock icono"></i></button>
                    </form>
                    @endif

                    <!-- <a href="" class="btn-lg">Vista <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a> -->
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