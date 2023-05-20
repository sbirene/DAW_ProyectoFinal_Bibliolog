@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Películas
@endsection

@section("activo_pelis")
activo
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <form action="{{route('peliculas.buscar')}}" class="buscador" method="POST">
        @csrf
        <input type="text" name="valor_buscar" id="valor" class="form-control">
        <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="listado">
        <h3 class="">Películas</h3>
        <div class="margen">
            <div class="row">
                @if(isset($resultados))

                @if(empty($resultados[0]))
                <h3 style="margin: 95px auto 0 auto !important;">No se han encontrado resultados</h3>
                @endif

                @foreach($resultados as $peli)
                <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                    <div class="card text-center h-100">
                        <img src="<?php echo e(asset('images/pelis/' . $peli->imagen)) ?>" class="card-img-top" alt="poster de la película">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{$peli->titulo}}</h5>
                            <a href="peliculas/{{$peli->id_peli}}" class="btn">Saber más</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @else

                @foreach($pelis as $peli)
                <div class="elemento col- col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1">
                    <div class="card text-center h-100">
                        <img src="<?php echo e(asset('images/pelis/' . $peli->imagen)) ?>" class="card-img-top" alt="poster de la película">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{$peli->titulo}}</h5>
                            <a href="peliculas/{{$peli->id_peli}}" class="btn">Saber más</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @endif
            </div>
        </div>
    </div>

</div>
<!-- fin contenido -->
@endsection