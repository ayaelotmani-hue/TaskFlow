
@extends('layouts.app')

@section('contenido')

<div class="dashboard">

    <!-- 1. Barra lateral -->
    <aside class="sidebar">

        <h1 class="sidebar__logo">TaskFlow</h1>

        <nav class="sidebar__nav">
            <a href="#" class="sidebar__link sidebar__link--active">
                Dashboard
            </a>

            <a href="#" class="sidebar__link">
                Mis tareas
            </a>

            <a href="#" class="sidebar__link">
                Mi perfil
            </a>
        </nav>

        <p class="sidebar__footer">
            Organiza, Colabora,<br>
            consigue tus objetivos
        </p>

    </aside>

    <!-- 2. Contenido principal -->
    <main class="dashboard__main">

        <!-- 3. Barra superior -->
        <header class="topbar">

            <input
                type="search"
                class="topbar__search"
                placeholder="Buscar mis tareas..."
                aria-label="Buscar mis tareas"
            >

            <div class="topbar__user">
                <span class="topbar__name">Nombre del trabajador</span>
                <span class="topbar__role">Trabajador</span>
            </div>

        </header>

        <!-- 4. Bienvenida -->
        <section class="welcome">
            <h2>¡Hola, trabajador!</h2>
            <p>Este es el resumen de tus tareas asignadas.</p>
        </section>

        <!-- 5. Resumen personal -->
        <section class="dashboard__stats">

            <article class="stat-card">
                <h3>Mis tareas</h3>
                <p class="stat-card__number">6</p>
                <p>Tareas asignadas</p>
            </article>

            <article class="stat-card">
                <h3>Pendientes</h3>
                <p class="stat-card__number">3</p>
                <p>Por empezar</p>
            </article>

            <article class="stat-card">
                <h3>En progreso</h3>
                <p class="stat-card__number">2</p>
                <p>En curso</p>
            </article>

            <article class="stat-card">
                <h3>Completadas</h3>
                <p class="stat-card__number">1</p>
                <p>Finalizadas</p>
            </article>

        </section>

        <!-- 6. Mis tareas recientes -->
        <section class="dashboard__content">

            <article class="dashboard-panel">
                <h3>Mis tareas recientes</h3>
                <p>Aquí aparecerán tus tareas más recientes.</p>
            </article>

            <article class="dashboard-panel">
                <h3>Mis tareas por prioridad</h3>
                <p>Aquí aparecerá el resumen de tus prioridades.</p>
            </article>

        </section>

    </main>

</div>

@endsection
