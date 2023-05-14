@extends("plantilla")

@section("titulo_pagina")
BiblioLog - Crear cuenta
@endsection

@section("contenido")
<!-- Contenido de la página -->
<div class="contenido container">

    <form action="{{ route('register') }}" method="POST" class="crear-cuenta">
        @csrf

        <div class="row mb-3">
            <div class="col">
                <label for="name" class="form-label">Nombre de Usuario</label>
                <input name="name" value="{{ old('name') }}" required class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"></input>
                @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
            <div class="col">
                <label for="email" class="form-label">Correo electrónico</label>
                <input name="email" value="{{ old('email') }}" required class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"></input>
                @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="password" class="form-label">Contraseña</label>
                <input name="password" type="password" required class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"></input>
                @if ($errors->has('password'))
                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
            <div class="col">
                <label for="password_confirmation" class="form-label">Confirmación contraseña</label>
                <input name="password_confirmation" type="password" required class="form-control"></input>
            </div>
        </div>

        <button type="submit" class="btn">Registrarme</button>

    </form>

</div>
<!-- fin contenido -->
@endsection