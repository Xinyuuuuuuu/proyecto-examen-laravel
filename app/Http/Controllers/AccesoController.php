<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccesoController extends Controller
{
    //
    public function formulario (){
        return view ('auth.acceso');
    }

    public function autentificar (Request $request){

        $email=$request->input('email');
        $contraseña=$request->input('password');
        $usuario=User::where('email',$email)->first();

        if($usuario && Hash::check($contraseña,$usuario->password)){
            session([
                'user_id'=>$usuario->id,
                'user_name'=>$usuario->name,
            ]);
            return redirect ('/zona-podcast');
        }

        return back()->with('error', 'Debe estar logeado')->withInput();//withInput() para conservar con old('email')
    }

    public function salir (){
        session()->forget(['user_id', 'user_name']);

        return redirect ('/acceso');
    }
}
