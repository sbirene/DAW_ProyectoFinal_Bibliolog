<?php

// dd($libro);
// dd($libro->id_peli);

use App\Http\Controllers\LibroController;
use App\Http\Controllers\Usuario_Libro_LeidoController;
use App\Http\Controllers\Usuario_Libro_PendienteController;
use Illuminate\Support\Facades\Auth;

$nombreAutor = LibroController::obtenerAutorLibro($libro->id_autor);

$pendiente = Usuario_Libro_PendienteController::comprobarPendiente(Auth::user()->id, $libro->id_libro);
$leido = Usuario_Libro_LeidoController::comprobarLeido(Auth::user()->id, $libro->id_libro);

?>

@extends("plantilla")

@section("titulo_pagina")
BiblioLog - {{$libro->titulo}}
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <div class="ficha">
        <h3 class="titulo mb-3 mb-lg-5 text-lg-start">{{$libro->titulo}}</h3>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-3 mb-2 mb-md-4 mb-lg-0">
                <img src="<?php echo e(asset('images/libros/' . $libro->imagen)) ?>" alt="portada del libro" class="mw-100 border rounded">
                @guest
                @else
                <div class="botones-biblioteca">

                    @if($leido == false)
                    <form action="{{route('librosLeidos.store', ['id' => $libro->id_libro])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="libro" value="{{$libro->id_libro}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Leído <i class="fa-solid fa-check icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('librosLeidos.borrar', ['id' => $libro->id_libro])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="libro" value="{{$libro->id_libro}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Leído <i class="fa-solid fa-check icono"></i></button>
                    </form>
                    @endif

                    @if($pendiente == false)
                    <form action="{{route('librosPendientes.store', ['id' => $libro->id_libro])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="libro" value="{{$libro->id_libro}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></button>
                    </form>
                    @else
                    <form action="{{route('librosPendientes.borrar', ['id' => $libro->id_libro])}}" method="post" class="w-fit">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="libro" value="{{$libro->id_libro}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn-lg marcado">Pendiente <i class="fa-regular fa-clock icono"></i></button>
                    </form>
                    @endif

                    <!-- <a href="" class="btn-lg">Leído <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a> -->
                </div>
                @endguest
            </div>
            <div class="col-10 col-md-10 col-lg-8 mt-2 mt-md-4 mt-lg-0">
                <table class="table align-middle table-borderless">
                    <tr>
                        <th class="text-center">Título</th>
                        <td>{{$libro->titulo}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Autor</th>
                        <td>{{$nombreAutor}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Año</th>
                        <td>{{$libro->year}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Número de páginas</th>
                        <td>{{$libro->num_pag}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Género</th>
                        <td>{{$libro->genero}}</td>
                    </tr>
                    <tr>
                        <th class="text-center">Sinopsis</th>
                        <td>{{$libro->sinopsis}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- fin contenido -->
@endsection