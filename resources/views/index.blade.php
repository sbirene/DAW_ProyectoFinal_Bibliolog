@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Inicio
@endsection

@section("activo_index")
activo
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido">

    <div class="titular t1">
        <h2>Haz un seguimiento de las películas o series que has visto.</h2>
        <h2>Guarda las que quieras ver.</h2>
        <i class="fa-solid fa-check fa-2xl icono"></i>
        <i class="fa-solid fa-folder-open fa-2xl icono"></i>
    </div>
    <div class="titular t2">
        <h2>Recuerda los libros que has leído. Marca los que quieras leer.</h2>
        <i class="fa-solid fa-check fa-2xl icono"></i>
        <i class="fa-solid fa-bookmark fa-2xl icono"></i>
    </div>

    <div class="posibilidades">
        <h4 class="titulo">Con <span class="negrita">Biblio</span><span class="estrechita">Log</span> también
            puedes...</h4>
        <div class="rectangulo r1">
            <h4>Conocer todas tus estadísticas de visionado y de lectura</h4>
        </div>
        <div class="rectangulo r2">
            <h4>Descubrir todas las novedades para no perderte nada</h4>
        </div>
        <div class="rectangulo r3">
            <h4>Ponerte al día con las noticias más destacadas</h4>
        </div>
    </div>

    <div class="titular">
        <h4 class="titulo">¡Empieza ya!</h4>
    </div>

</div>
<!-- fin contenido -->
@endsection