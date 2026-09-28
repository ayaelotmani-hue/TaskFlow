<x-layout>
    <section class="login-card">
        <h2>Iniciar Sessión</h2>
        <form action="/login" method="POST" class="login-form">
            <!-- Protección -->
            @csrf

            <!-- el campo de email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="email">
            </div>

            <!--el campo de contrasenya -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="********">
            </div>

            <div class="form-group-checkbox">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember"> Recordarme
                </label>
            </div>

            <div class="form-link">
                <a href="#">Has olvidado la contraseña?</a>
            </div>

            <!-- Botón -->
            <button type="submit" class="btn-submit">Entrar</button>
        </form>
    </section>

</x-layout>