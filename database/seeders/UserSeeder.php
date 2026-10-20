<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importamos el modelo User para hablar con la tabla 'users'
use Illuminate\Support\Facades\Hash; // Importamos la herramienta para encriptar contraseñas

class UserSeeder extends Seeder
{
 
    public function run(): void
    {
        // Creamos el usuario Administrador
        User::create([
            'name' => 'Aya Admin',
            'email' => 'admin@taskflow.com',
            'password' => Hash::make('123456'), // Encripta la contraseña de forma segura
            'role' => 'admin',
        ]);

        // 2. Creamos el usuario Trabajador
        User::create([
            'name' => 'Eiman Trabajador',
            'email' => 'eiman@taskflow.com',
            'password' => Hash::make('123456'),
            'role' => 'trabajador',
        ]);
    }
}