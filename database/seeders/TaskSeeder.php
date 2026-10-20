<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task; // Importamos el modelo Task para crear tareas
use App\Models\User; // Importamos el modelo User para buscar los usuarios

class TaskSeeder extends Seeder
{

    public function run(): void
    {
        // Buscamos a la trabajadora Eiman en la BD para saber su ID real
        $eiman = User::where('email', 'eiman@taskflow.com')->first();
        
        // Buscamos a la administradora Aya en la BD
        $aya = User::where('email', 'admin@taskflow.com')->first();

        // Creamos una tarea PENDIENTE asignada a Eiman
        Task::create([
            'titulo' => 'Diseñar la base de datos',
            'descripcion' => 'Crear las tablas y los enums en MySQL.',
            'prioridad' => 'alta',
            'estado' => 'pendiente', // Cumple tu ENUM
            'fecha' => '2026-10-20',
            'categoria' => 'Backend',
            'user_id' => $eiman->id, // Conectada con la ID real de eiman
        ]);

        // Creamos una tarea EN PROCESO asignada a eiman
        Task::create([
            'titulo' => 'Maquetación con SCSS',
            'descripcion' => 'Aplicar estilos BEM a las vistas Blade.',
            'prioridad' => 'mitjana',
            'estado' => 'en_proces', // Cumple tu ENUM
            'fecha' => '2026-10-25',
            'categoria' => 'Frontend',
            'user_id' => $eiman->id,
        ]);

        // 5. Creamos una tarea COMPLETADA asignada a Aya (Admin)
        Task::create([
            'titulo' => 'Revisión del Sprint 1',
            'descripcion' => 'Validar que el Login básico funciona.',
            'prioridad' => 'baixa',
            'estado' => 'completades', // Cumple tu ENUM
            'fecha' => '2026-10-15',
            'categoria' => 'Gestión',
            'user_id' => $aya->id,
        ]);
    }
}