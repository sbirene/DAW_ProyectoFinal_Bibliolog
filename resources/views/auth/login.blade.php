@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Iniciar Sesión
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido container">

    <form action="{{ route('login') }}" method="POST" class="iniciar-sesion">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="email" class="form-label">Correo electrónico</label>
                <input name="email" value="{{ old('email') }}" required class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"></input>
                @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
            <div class="col">
                <label for="password" class="form-label">Contraseña</label>
                <input name="password" type="password" required class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"></input>
                @if ($errors->has('password'))
                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" value="{{ old('remember') ? 'checked' : '' }}">
                <label for="remember" class="form-check-label">Mantener la sesión iniciada</label>
            </div>
        </div>

        <button type="submit" class="btn">Iniciar Sesión</button>
    </form>

</div>
<!-- fin contenido -->
@endsection