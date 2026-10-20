@extends('layouts.app')
@section('contenido')

<div class="dashboard">

    <!-- Barra lateral -->
    <aside class="sidebar">

        <h1 class="sidebar__logo">TaskFlow</h1>

        <nav class="sidebar__nav">
            <a href="#" class="sidebar__link sidebar__link--active">
                Dashboard
            </a>

            <a href="#" class="sidebar__link">
                Tareas
            </a>

            <a href="#" class="sidebar__link">
                Usuarios
            </a>

            <a href="#" class="sidebar__link">
                Informes
                </a>

            <a href="#" class="sidebar__link">
                Configuración
            </a>
        </nav>

        <p class="sidebar__footer">
            Organiza, Colabora,<br>
            consigue tus objetivos
        </p>

    </aside>

    <!-- Contenido principal -->
    <main class="dashboard__main">

        <!-- Barra superior -->
        <header class="topbar">
         <input
                type="search"
                class="topbar__search"
                placeholder="Buscar tareas, incidencias..."
                aria-label="Buscar tareas e incidencias"
            >

            <div class="topbar__user">
                <span class="topbar__name">{{ $usuarioLogueado->name }}</span>
                <span class="topbar__role">{{ $usuarioLogueado->role }}</span>
            </div>

        </header>

        <!-- Bienvenida -->
        <section class="welcome">
            <h2>¡Hola, {{ $usuarioLogueado->name }}!</h2>
            <p>Aquí tienes un resumen general de TaskFlow.</p>
        </section>

            <!-- Tarjetas de estadísticas -->
            <section class="dashboard__stats">

        <article class="stat-card">
            <h3>Total de tareas</h3>
            <!-- PASO E: Pintamos el número del total de tareas (SIN count porque ya viene contado) -->
            <p class="stat-card__number">{{ $totalTareasContador }}</p>
            <p>Todas las tareas</p>
        </article>

        <article class="stat-card">
            <h3>Tareas pendientes</h3>
            <!-- PASO E: Cuenta las tareas con estado 'pendiente' -->
            <p class="stat-card__number">{{ $tareasPendientes->count() }}</p>
            <p>Por empezar</p>
        </article>

        <article class="stat-card">
            <h3>Tareas completadas</h3>
            <!-- PASO E: Cuenta las tareas con estado 'completades' -->
            <p class="stat-card__number">{{ $tareasCompletadas->count() }}</p>
            <p>Finalizadas</p>
        </article>

        <article class="stat-card">
            <h3>Usuarios registrados</h3>
            <!-- PASO E: Pintamos el número total de usuarios (SIN count porque ya viene contado) -->
            <p class="stat-card__number">{{ $totalUsuariosSistema }}</p>
            <p>Cuentas del sistema</p>
        </article>

    </section>

        <!-- Paneles informativos -->
        <section class="dashboard__content">

            <article class="dashboard-panel">
                <h3>Tareas por estado</h3>
                <p>Aquí aparecerá el resumen de tareas por estado.</p>
            </article>

            <article class="dashboard-panel">
                <h3>Tareas por prioridad</h3>
                <p>Aquí aparecerá el resumen por prioridad.</p>
            </article>

            <article class="dashboard-panel">
                <h3>Últimas tareas</h3>
                <p>Aquí aparecerán las últimas tareas creadas.</p>
            </article>

            <article class="dashboard-panel">
                <h3>Tareas por categoría</h3>
                <p>Aquí aparecerá el resumen por categoría.</p>
            </article>

            <article class="dashboard-panel">
                <h3>Tareas recientes</h3>
                <p>Aquí aparecerá el listado de tareas recientes.</p>
            </article>

            <article class="dashboard-panel">
                <h3>Usuarios</h3>
                <p>Aquí aparecerán los usuarios registrados.</p>
            </article>

        </section>

    </main>

</div>
@endsection