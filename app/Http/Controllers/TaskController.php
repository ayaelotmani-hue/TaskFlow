<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task; // Importa tu Modelo Task para hablar con la tabla `tasks`
use Illuminate\Support\Facades\Auth; // Importa la herramienta de sesiones Auth

class TaskController extends Controller
{
    public function index()
    {
        // Saber quién es el usuario que está navegando
        $usuarioLogueado = Auth::user();

        if ($usuarioLogueado->role === 'admin') {
            // El administrador ve todas las tareas de la tabla
            $todasLasTareas = Task::all();
        } else {
            // El trabajador solo ve las tareas donde 'user_id' coincida con su ID
            $todasLasTareas = Task::where('user_id', $usuarioLogueado->id)->get();
        }
        // Filtramos y separamos en tres variables independientes
        $tareasPendientes  = $todasLasTareas->where('estado', 'pendiente');
        $tareasEnProceso   = $todasLasTareas->where('estado', 'en_proces');
        $tareasCompletadas = $todasLasTareas->where('estado', 'completades');
       // Calculamos el total de tareas contando el saco completo
        $totalTareasContador = $todasLasTareas->count();
       //Calculamos el total de usuarios registrados en el sistema
        $totalUsuariosSistema = \App\Models\User::count();
        $respuesta = view('dashboard', compact(
        'tareasPendientes', 
        'tareasEnProceso', 
        'tareasCompletadas', 
        'usuarioLogueado',
        'totalTareasContador',   
        'totalUsuariosSistema' 
    ));
    return $respuesta;
    }
}