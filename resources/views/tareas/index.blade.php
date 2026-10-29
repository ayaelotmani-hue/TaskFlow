@extends('layouts.app')

@section('contenido')
<div class="dashboard">

    <!-- Barra lateral -->
    <aside class="sidebar">
        <h1 class="sidebar__logo">TaskFlow</h1>
        <nav class="sidebar__nav">
            <a href="/dashboard" class="sidebar__link">Dashboard</a>
            <a href="/tareas" class="sidebar__link sidebar__link--active">Tareas</a>
            <a href="#" class="sidebar__link">Usuarios</a>
            <a href="#" class="sidebar__link">Informes</a>
            <a href="#" class="sidebar__link">Configuración</a>
        </nav>
        <p class="sidebar__footer">Organiza, Colabora,<br>consigue tus objetivos</p>
    </aside>

    <!-- Contenido Principal -->
    <main class="dashboard__main">
        
        <header class="topbar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div class="welcome">
                <h2>Crear nueva tarea</h2>
            </div>

            <!-- CONDICIONAL: El botón de crear solo aparece si eres ADMIN -->
            @if($usuarioLogueado->role === 'admin')
                <a href="/tareas/crear" style="background: #2563eb; color: white; padding: 10px 16px; border-radius: 4px; text-decoration: none; font-weight: bold;">
                    + Nova Tasca
                </a>
            @endif
        </header>

        <section class="dashboard__content" style="display: block; background: white; padding: 24px; border-radius: 8px;">
            
            @if($tareasParaMostrar->isNotEmpty())
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 2px solid #eee;">
                            <th style="padding: 12px;">Titol</th>
                            <th style="padding: 12px;">Prioritad</th>
                            <th style="padding: 12px;">Estado</th>
                            <th style="padding: 12px;">Data Límit</th>
                            <!-- CONDICIONAL 2: El Admin ve una columna extra para saber de quién es -->
                            @if($usuarioLogueado->role === 'admin')
                                <th style="padding: 12px;">Asignada a</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tareasParaMostrar as $tarea)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 12px; font-weight: bold;">{{ $tarea->titulo }}</td>
                                <td style="padding: 12px;">{{ $tarea->prioridad }}</td>
                                <td style="padding: 12px;">{{ $tarea->estado }}</td>
                                <td style="padding: 12px;">{{ $tarea->fecha }}</td>
                                <!-- CONDICIONAL 3: Si es admin, pintamos el nombre del trabajador de esa fila -->
                                @if($usuarioLogueado->role === 'admin')
                                    <td style="padding: 12px; color: #555;">
                                        {{ $tarea->user->name ?? 'Sense assignar' }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hi ha tasques per mostrar en aquest moment.</p>
            @endif

        </section>
    </main>
</div>
@endsection