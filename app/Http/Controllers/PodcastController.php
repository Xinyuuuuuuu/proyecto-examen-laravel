<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

// index  -> listar
// create -> formulario crear
// store  -> guardar
// edit   -> formulario editar
// update -> actualizar
// destroy -> borrar

class PodcastController extends Controller
{
    //
    public function index()
    {
        $podcasts = Podcast::all();
        $total = $podcasts->count();

        return view('podcasts.index', compact('podcasts', 'total'));
    }

    public function privado()
    {
        if (!session()->has('user_id')) {
            return redirect('/login')->with('error', 'Para visualizar Podcast debes estar logueado');
        }

        $user = User::with('podcasts')->find(session('user_id'));
        $podcasts = Podcast::all();
        $total = $podcasts->count();
        $userName = session('user_name');

        return view('podcasts.privado', compact('podcasts', 'total', 'userName', 'user'));
    }

    public function anadirFavorito($podcastId)
    {
        if (!session()->has('user_id')) {
            return redirect('/login')->with('error', 'Debes iniciar sesión');
        }

        $user = User::find(session('user_id'));

        if (!$user->podcasts->contains($podcastId)) {
            $user->podcasts()->attach($podcastId);
        }
        return redirect('/podcast-privado');
    }

    public function quitarFavorito($podcastId)
    {
        if (!session()->has('user_id')) {
            return redirect('/login')->with('error', 'Debes iniciar sesión');
        }

        $user = User::find(session('user_id'));

        $user->podcasts()->detach($podcastId);

        return redirect('/podcast-privado');
    }

    public function create()
    {
        return view('podcasts.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            //Validacion con mensaje de error personalizado, errores se transfieren a la variable $errors
            [
                'titulo' => 'required|string|min:3|max:100',
                'autor' => 'required|string|min:3|max:100'
            ],
            [
                'titulo.required' => 'El título es obligatorio',
                'titulo.min' => 'El título debe tener al menos 3 caracteres',
                'autor.required' => 'El autor es obligatorio'
            ]
        );

        Podcast::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
        ]);

        return redirect('/podcasts')->with('success', 'Podcast creado correctamente');
    }

    public function edit($id)
    { //carga el podcast actual (READ)
        $podcast = Podcast::find($id);

        if (!$podcast) { //en caso de que no exista el podcast 
            return redirect('/podcasts')->with('error', 'Podcast no encontrado');
        }
        return view('podcasts.edit', compact('podcast'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|min:3|max:100',
            'autor' => 'required|string|min:3|max:100',
        ]);

        $podcast = Podcast::find($id);

        if (!$podcast) {
            return redirect('/podcasts');
        }

        $podcast->update([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor')
        ]);

        return redirect('/podcasts')->with('success', 'Podcast actualizado correctamente');
    }

    public function destroy($id)
    {
        $podcast = Podcast::find($id);

        if (!$podcast) {
            return redirect('/podcasts')->with('error', 'Podcast no encontrado');
        }

        $podcast->delete();

        return redirect('/podcasts')->with('success', 'Podcast eliminado correctamente');
    }

    //------------------------------------------------------------------------------------------//

    public function resumen()
    {
        $podcasts = Podcast::with('songs')->get();
        $total = $podcasts->count();

        return view('podcasts.resumen', compact('podcasts', 'total'));
    }

    public function zona()
    {
        if (!session()->has('user_id')) {
            return redirect('/acceso')->with('error', 'Debe iniciar sesion para acceder');
        }

        $usuario = User::with('podcasts')->find(session('user_id'));
        $totalPodcastsUsuario = $usuario->podcasts->count(); //cuenta podcasts del usuario mediante la RELACION N:M
        $podcastsUsuario = $usuario->podcasts; //Saca el conjunto de podcasts que tiene el usuario

        return view('podcasts.zona', compact('usuario', 'totalPodcastsUsuario', 'podcastsUsuario'));
    }

    public function show($id)
    {
        $podcast = Podcast::with('songs')->find($id);

        if (!$podcast) {
            return redirect('/podcasts')->with('error', 'Podcast no encontrado.');
        }

        $totalCanciones = $podcast->songs->count();
        return view('podcasts.show', compact('podcast', 'totalCanciones'));
    }


}
