<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function showLogin(){
        return view('auth.login'); 
    }
    public function login(Request $request){
        $datos = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt($datos)) {
            $request->session()->regenerate();
            $respuesta=redirect('/dashboard');
        }else{//si falla
            $respuesta=back()->withErrors([
              'email' => 'El usuario o la contraseña no son correctos.',]);
        }
        return $respuesta;

   
   
       
    }

   
}