@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Series
@endsection

@section("activo_series")
activo
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <form action="{{route('series.buscar')}}" class="buscador" method="post">
        @csrf
        <input type="text" name="valor_buscar" id="valor" class="form-control">
        <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="listado">
        <h3 class="">Series</h3>

        <div class="generos">
            <a href="{{ route('series.index') }}" class="btn">Todas</a>
            <a href="{{ route('series.buscarPorGenero', 'accion') }}" class="btn">Acción</a>
            <a href="{{ route('series.buscarPorGenero', 'aventuras') }}" class="btn">Aventuras</a>
            <a href="{{ route('series.buscarPorGenero', 'ciencia ficcion') }}" class="btn">Ciencia Ficción</a>
            <a href="{{ route('series.buscarPorGenero', 'comedia') }}" class="btn">Comedia</a>
            <a href="{{ route('series.buscarPorGenero', 'crimen') }}" class="btn">Crimen</a>
            <a href="{{ route('series.buscarPorGenero', 'drama') }}" class="btn">Drama</a>
            <a href="{{ route('series.buscarPorGenero', 'musical') }}" class="btn">Musical</a>
            <a href="{{ route('series.buscarPorGenero', 'romance') }}" class="btn">Romance</a>
            <a href="{{ route('series.buscarPorGenero', 'thriller') }}" class="btn">Thriller</a>
            <a href="{{ route('series.buscarPorGenero', 'western') }}" class="btn">Western</a>
        </div>

        <div class="margen">
            <div class="row">
                @if(isset($resultados))

                @if(empty($resultados[0]))
                <h3 style="margin: 95px auto 0 auto !important;">No se han encontrado resultados</h3>
                @endif

                @foreach($resultados as $serie)
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

                @else

                @foreach($series as $serie)
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

                @endif
            </div>
        </div>
    </div>

</div>
<!-- fin contenido -->
@endsection