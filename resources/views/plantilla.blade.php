<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield("titulo_pagina")</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" type='text/css' media='screen' href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type='text/css' media='screen' href="{{asset('css/app.css')}}">

    <!-- Importar tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <!-- fin -->

</head>

<body>
    <!-- Cabecera para ordenadores -->
    <div class="cabecera ordenador">
        <div class="menu">
            <a href="index" id="logo"><img src="{{asset('images/logo_bibliolog_blanco.png')}}" alt="logo de la página"></a>
            <ul class="navbar">
                <li class="nav-item @yield('activo_index')">
                    <a class="nav-link" href="index">Inicio</a>
                </li>
                <li class="nav-item @yield('activo_novedades')">
                    <a class="nav-link" href="novedades.html">Novedades</a>
                </li>
                <li class="nav-item @yield('activo_pelis')">
                    <a class="nav-link" href="peliculas.html">Películas</a>
                </li>
                <li class="nav-item @yield('activo_series')">
                    <a class="nav-link" href="series.html">Series</a>
                </li>
                <li class="nav-item @yield('activo_libros')">
                    <a class="nav-link" href="libros.html">Libros</a>
                </li>
                <li class="nav-item @yield('activo_sobre')">
                    <a class="nav-link" href="sobre-bibliolog.html">Sobre <span class="negrita">Biblio</span><span class="estrechita">Log</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- fin cabecera -->

    <!-- Cabecera para tablets y móviles -->
    <div class="cabecera dispositivos">
        <div class="menu">
            <a href="index.html" id="logo"><img src="{{asset('images/logo_bibliolog_blanco.png')}}" alt="logo de la página"></a>
            <div tabindex="0" class="menu-responsive">
                <div class="menu-dropdown">
                    <a class="nav-link" href="index.html">Inicio</a>
                    <a class="nav-link" href="novedades.html">Novedades</a>
                    <a class="nav-link" href="peliculas.html">Películas</a>
                    <a class="nav-link" href="series.html">Series</a>
                    <a class="nav-link" href="libros.html">Libros</a>
                    <a class="nav-link" href="noticias.html">Noticias</a>
                    <a class="nav-link" href="sobre-bibliolog.html">Sobre <span class="negrita">Biblio</span><span class="estrechita">Log</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- fin cabecera -->


    <!-- Contenido de la página -->
    <div class="contenido">
        @yield("contenido")
    </div>
    <!-- fin contenido -->


    <!-- Pie -->
    <div class="pie">
        <p class=""><span class="negrita">Biblio</span><span class="estrechita">Log</span> | Proyecto Final DAW</p>
    </div>
    <!-- fin pie -->
</body>

</html>