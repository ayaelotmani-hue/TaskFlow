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

            <a href="/tareas" class="sidebar__link">
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
            <p class="stat-card__number">{{ $totalUsuarios }}</p>
            <p>Cuentas del sistema</p>
        </article>

    </section>

        <!-- Paneles informativos -->
        <section class="dashboard__content">

            <article class="dashboard-panel">
                <h3>Tareas por estado</h3>

                <ul class="status-summary" style="list-style: none; padding: 0;">
                <li style="margin-bottom: 8px;">
                    <span>Pendientes:</span>
                    <strong>{{ $tareasPendientes->count() }}</strong>
                </li>
                <li style="margin-bottom: 8px;">
                    <span>En proceso:</span>
                    <strong>{{ $tareasEnProceso->count() }}</strong>
                </li>
                <li style="margin-bottom: 8px;">
                    <span>Completadas:</span>
                    <strong>{{ $tareasCompletadas->count() }}</strong>
                </li>
                </ul>
            </article>

            <article class="dashboard-panel">
                <h3>Tareas por prioridad</h3>
                <div class="panel-stat" style="margin-bottom: 8px;">
                    <span>Prioridad Alta:</span>
                    <strong>{{ $tareasAlta->count() }}</strong>
                </div>

                <div class="panel-stat" style="margin-bottom: 8px;">
                    <span>Prioridad Media:</span>
                    <strong>{{ $tareasMitjana->count() }}</strong>
                </div>

                <div class="panel-stat" style="margin-bottom: 8px;">
                    <span>Prioridad Baja:</span>
                    <strong>{{ $tareasBaixa->count() }}</strong>
                </div>
            </article>

            <article class="dashboard-panel">
                <h3>Últimas tareas</h3>

                    @if($ultimasTareas->isNotEmpty())
                    <!-- Recorremos las 3 últimas tareas una a una -->
                        @foreach($ultimasTareas as $tarea)
                            <div class="panel-stat" style="margin-bottom: 8px; display: flex; justify-content: space-between;">
                                <!-- Pintamos el título de la tarea -->
                                <span>{{ $tarea->titulo }}</span>
                                
                                <!-- Pintamos su prioridad en negrita -->
                                <strong>({{ $tarea->prioridad }})</strong>
                            </div>
                        @endforeach
                    @else
                        <!-- Si no hay ninguna tarea en la base de datos -->
                        <p>No hay tareas registradas en el sistema.</p>
                    @endif
            </article>

            <article class="dashboard-panel">
                <h3>Tareas por categoría</h3>
                  <!-- Recorremos las categorías  -->
                @foreach($tareasPorCategoria as $nombreCategoria => $tareasDeEsteGrupo)
                    <div class="panel-stat" style="margin-bottom: 8px;">
                        <span>{{ $nombreCategoria }}:</span>
                        <strong>{{ $tareasDeEsteGrupo->count() }}</strong>
                    </div>
                @endforeach

            </article>

            <article class="dashboard-panel">
                <h3>Usuarios</h3>
                @foreach($listaUsuarios as $usuario)
                    <div class="panel-stat" style="margin-bottom: 8px; display: flex; justify-content: space-between;">
                        <!-- Pintamos el nombre real de cada usuario -->
                        <span>{{ $usuario->name }}</span>
                        
                        <!-- Pintamos su rol asignado en negrita -->
                        <strong>({{ $usuario->role }})</strong>
                    </div>
                @endforeach
            </article>

        </section>

    </main>

</div>
@endsection