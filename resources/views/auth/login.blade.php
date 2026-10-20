@extends('layouts.app')

@section('contenido')
    <section class="login-container">
          <!-- Zona de la imagen -->
        <div class="login-image">
            <img src="images/login.png" alt="Imagen de TaskFlow">
        </div>

        <!-- Zona del formulario -->
        <div class="login-content">

            <h1>TaskFlow</h1>

            <h2>Iniciar Sesión</h2>
            <!-- mensaje de error para js-->
            <div id="error" style="color: #ba1b1b; font-weight: 600; margin-left: 20px; margin-bottom: 20px; white-space: pre-line;"></div>

            <form action="/login" method="POST" id="form">

                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="tu@email.com"
                        required
                    >
                    @error('email')
                        <span class="text-error" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password">Contraseña</label>

                    <div class="password-container">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Introduce tu contraseña"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            aria-label="Mostrar u ocultar contraseña"
                        >
                            
                        </button>
                    </div>
                </div>

                <!-- Recordarme y recuperar contraseña -->
                <div class="login-options">

                    <label class="remember">
                        <input type="checkbox" name="remember">
                        <span>Recordarme</span>
                    </label>

                    <a href="#" class="forgot-password">
                        ¿Olvidaste tu contraseña?
                    </a> 

                </div> <br>

                <!-- Botón -->
                <button type="submit" class="btn-login">
                    Iniciar Sesión
                </button>

                <!-- Separador -->
                <div class="separator">
                    <span></span>
                    <p>O</p>
                    <span></span>
                </div>

                <!-- Botón de Google -->
                <button type="button" class="btn-google">
                    <span class="google-icon">G</span>
                    Iniciar Sesión con Google
                </button>

            </form>

        </div>

    </section>

@endsection
