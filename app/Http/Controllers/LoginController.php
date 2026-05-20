<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class LoginController extends Controller
{
    //
    public function formulario(){
        return view ('auth.login');
    }

    public function autenticar (Request $request) {

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        
        if ($user && Hash::check($password, $user->password)){
            session([
                'user_id'=>$user->id,
                'user_name'=>$user->name,
            ]);

            return redirect('/podcast-privado');
        }

        return back()->with('error', 'Para visualizar Podcast debes estar logeado');
    }

    public function logout(){
        session()->forget(['user_id','user_name']);

        return redirect('/login');
    }
}
