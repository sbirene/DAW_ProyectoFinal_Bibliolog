<?php

// dd($libro);
// dd($libro->id_peli);

use App\Http\Controllers\LibroController;

$nombreAutor = LibroController::obtenerAutorLibro($libro->id_autor);

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
                    <a href="" class="btn-lg">Leído <i class="fa-solid fa-check icono"></i></a>
                    <a href="" class="btn-lg">Pendiente <i class="fa-regular fa-clock icono"></i></a>
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