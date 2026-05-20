<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;

class SongController extends Controller
{
    //

    public function buscar(Request $request)
    {
        $texto = $request->input('texto');

        $songs = Song::with('podcast')
            ->where('nombre', 'like', '%' . $texto . '%') //like %% devuelve todas de por si
            ->get();

        return view('songs.buscar', compact('songs', 'texto'));
    }

    //------------------//

    public function buscarCanciones(Request $request)
    {

        $texto = $request->input('texto');

        $songs = Song::with('podcast')
            ->where('nombre', 'like', '%' . $texto . '%')  //Si no introduce texto queda %% lo que devulve todos los songs
            ->get();

        return view('songs.buscarCanciones', compact('songs', 'texto',));
    }

    public function create()
    {
        $podcasts = Podcast::all();
        return view('songs.create', compact('podcasts'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|string|min:3|max:50',
                'artista' => 'required|string|min:3|max:50',
                'podcast_id' => 'required|exists:podcasts,id' //exists en la tabla PODCASTS la columna ID
            ],
            [
                'nombre.required' => 'El nombre es obligatorio',
                'artista.required' => 'El artista es obligatorio',
                'podcast_id.exists' => 'El podcast introducido no es valido'
            ]
        );

        Song::create([
            'nombre' => $request->input('nombre'),
            'artista' => $request->input('artista'),
            'podcast_id' => $request->input('podcast_id')
        ]);


        return redirect('/podcasts')->with('success', 'Canción "' . $request->input('nombre') . '" creado correctamente');
    }

    public function catalogo(Request $request)
    {
        $texto = $request->input('texto');
        $songs = Song::with('podcast')->where('nombre', 'like', '%' . $texto . '%')->get();
        $totalCanciones = $songs->count();

        return view('songs.catalogo', compact('texto', 'songs', 'totalCanciones'));
    }

    public function gestion(Request $request)
    {
        $texto = $request->input('texto');
        $songs = Song::with('podcast')->where('nombre', 'like', '%' . $texto . '%')->get();
        $totalCanciones = $songs->count();

        $podcasts = Podcast::all(); //para el select
        return view('songs.gestion', compact('texto', 'songs', 'totalCanciones', 'podcasts'));
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'artista' => 'required|string|min:2|max:100',
            'podcast_id' => 'required|exists:podcasts,id'
        ]);

        Song::create([
            'nombre' => $request->input('nombre'),
            'artista' => $request->input('artista'),
            'podcast_id' => $request->input('podcast_id'),
        ]);

        return redirect('/gestion-canciones')->with('success', 'Canción creada correctamente.');
    }

    public function showDetalles($id)
    {

        $song = Song::with('podcast')->find($id);

        if (!$song) {
            return redirect('/gestion-canciones')->with('error', 'No existe esta canción');
        }

        $podcasts = Podcast::all();
        return view('songs.show', compact('song', 'podcasts'));
    }

    //---------------Edit individuales---------------//

    public function updateNombre(Request $request, $id)
    {
        $request->validate(['nombre' => 'required|string|min:2|max:100']);
        $song = Song::find($id);

        if (!$song) {
            return redirect('/gestion-canciones')->with('error', 'No existe esta canción');
        }

        if ($song->nombre == $request->nombre) {
            return redirect('/gestion-canciones/' . $song->id)->with('error', 'No se han hecho cambios');
        }

        $song->update(['nombre' => $request->input('nombre')]);

        return redirect('/gestion-canciones/' . $song->id)->with('success', 'Campo nombre actualizado correctamente');
    }
    public function updateArtista(Request $request, $id)
    {
        $request->validate(['artista' => 'required|string|min:2|max:100']);
        $song = Song::find($id);

        if (!$song) {
            return redirect('/gestion-canciones')->with('error', 'No existe esta canción');
        }

        if ($song->artista == $request->artista) {
            return redirect('/gestion-canciones/' . $song->id)->with('error', 'No se han hecho cambios');
        }

        $song->update(['artista' => $request->input('artista')]);

        return redirect('/gestion-canciones/' . $song->id)->with('success', 'Campo artista actualizado correctamente');
    }
    public function updatePodcast(Request $request, $id) {
        $request->validate([
            'podcast_id'=>'required|exists:podcasts,id'
        ]);
        
        $song=Song::find($id);

        if(!$song){
            return redirect ('/gestion-canciones')->with('error', 'No existe esta canción');
        }

        if ($song->podcast_id == $request->podcast_id) {
            return redirect ('/gestion-canciones/'.$song->id)->with('error', 'No se han hecho cambios');
        }

        $song->update(['podcast_id'=>$request->input('podcast_id')]);

        return redirect ('/gestion-canciones/'.$song->id)->with('success', 'Campo podcast se ha actualizado correctamente');

    }

    public function deleteCancion ($id){
        $song=Song::find($id);

        if (!$song) {
            return redirect('/gestion-canciones')->with('error', 'No existe esta canción');;
        }
        
        $song->delete();

        return redirect ('/gestion-canciones')->with('success','"'.$song->nombre. '" ha sido borrada');
    }
}
