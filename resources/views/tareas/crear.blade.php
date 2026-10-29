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

    <!-- Contenido principal del formulario -->
    <main class="dashboard__main">
        
        <section class="welcome">
            <h2>Crear Nova Tasca</h2>
            <p>Introduce los datos para dar de alta una nueva tarea en el sistema.</p>
        </section>

        <section class="dashboard__content" style="display: block; max-width: 1000px; background: white; padding: 24px; border-radius: 8px;">
            
            <!-- El formulario de momento apunta a un enlace vacío (#) -->
            <form action="/tareas/crear" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
                
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label for="titulo">Títol de la tasca</label>
                    <input type="text" name="titulo" id="titulo" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label for="descripcion">Descripció</label>
                    <textarea name="descripcion" id="descripcion" rows="4" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                </div>

                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label for="prioridad">Prioritat</label>
                    <select name="prioridad" id="prioridad" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="alta">Alta</option>
                        <option value="mitjana">Mitjana</option>
                        <option value="baixa">Baixa</option>
                    </select>
                </div>

                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label for="estado">Estat Inicial</label>
                    <select name="estado" id="estado" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="pendiente">Pendiente</option>
                        <option value="en_proces">En procés</option>
                        <option value="completades">Completades</option>
                    </select>
                </div>

                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label for="fecha">Data Límit</label>
                    <input type="date" name="fecha" id="fecha" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label for="categoria">Categoria</label>
                    <input type="text" name="categoria" id="categoria" required placeholder="Ej. Backend, Frontend" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 12px; display: flex; gap: 12px;">
                    <button type="submit" style="background: #2563eb; color: white; padding: 10px 16px; border: none; border-radius: 4px; cursor: pointer;">Guardar Tasca</button>
                    <a href="/tareas" style="background: #e5e7eb; color: black; padding: 10px 16px; border-radius: 4px; text-decoration: none; text-align: center;">Cancelar</a>
                </div>

            </form>
        </section>

    </main>
</div>
@endsection