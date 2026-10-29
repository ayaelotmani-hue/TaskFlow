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
        //calcular las tareas segun prioridad
        $tareasAlta    = $todasLasTareas->where('prioridad', 'alta');
        $tareasMitjana = $todasLasTareas->where('prioridad', 'mitjana');
        $tareasBaixa   = $todasLasTareas->where('prioridad', 'baixa');
        //ordenar las tareas 
        $ultimasTareas = $todasLasTareas->sortByDesc('created_at')->take(3);
        //agrupar las categorias 
        $tareasPorCategoria = $todasLasTareas->groupBy('categoria');
       // Calculamos el total de tareas contando el saco completo
        $totalTareasContador = $todasLasTareas->count();
       //Calculamos etotalUsuario total de usuarios registrados en el sistema
        $totalUsuarios= \App\Models\User::count();
        //traemos la lista de usuarios
        $listaUsuarios = \App\Models\User::all();
        $respuesta = view('dashboard', compact(
        'tareasPendientes', 
        'tareasEnProceso', 
        'tareasCompletadas', 
        'usuarioLogueado',
        'totalTareasContador',   
        'totalUsuarios',
        'tareasAlta',   
        'tareasMitjana', 
        'tareasBaixa',
        'ultimasTareas',
        'tareasPorCategoria',
        'listaUsuarios'
    ));
    return $respuesta;
    }
    public function listado(){
        //Saber quién está navegando
        $usuarioLogueado = Auth::user();
        // Filtro de roles
        if ($usuarioLogueado->role === 'admin') {
            // El admin saca absolutamente todas las tareas y además cargamos el usuario asignado
            $tareasParaMostrar = Task::with('user')->get();
        } else {
            // El trabajador normal solo saca las suyas
            $tareasParaMostrar = Task::where('user_id', $usuarioLogueado->id)->get();
        }

    //empaquetamos en la caja del compact y cargamos la vista index
    $respuesta = view('tareas.index', compact('tareasParaMostrar', 'usuarioLogueado'));
    return $respuesta;
    }
    public function store(Request $request){
        // Validamos que los datos cumplan con los formatos y enums requeridos
        $datosValidados = $request->validate([
            'titulo'      => 'required|max:255',
            'descripcion' => 'required',
            'prioridad'   => 'required|in:alta,mitjana,baixa', // Cumple tu ENUM
            'estado'      => 'required|in:pendiente,en_proces,completades', // Cumple tu ENUM
            'fecha'       => 'required|date',
            'categoria'   => 'required|max:255',
        ]);
        $datosValidados['user_id'] = Auth::id();

        //Traduce esto a SQL e inserta la fila en la tabla 'tasks'
        Task::create($datosValidados);
        // D. Preparamos el viaje de vuelta al listado avisando de que todo ha ido genial
        $respuesta = redirect('/tareas')->with('success', 'Tasca creada con éxito.');
        return $respuesta;
    }
    public function create(){
            // Busquem la vista dins de la carpeta tareas, el fitxer create.blade.php
            $respuesta = view('tareas.crear');

            // L'únic return permès al final de la funció
            return $respuesta;
        }
    }
