<?php


use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AccesoController;
 
Route::get('/' , function () {
    return view('home') ;
});

Route::get('/hola' , function () {
    return "Hola desde Laravel" ;
});

Route::get('/saludo',[PruebaController::class, 'saludo']);
Route::get('/bienvenida',[PruebaController::class, 'bienvenida']);
Route::get('/podcast',[PruebaController::class, 'podcast']);
Route::get('/podcasts',[PodcastController::class, 'index']);
Route::get('/buscar',[SongController::class, 'buscar']);

Route::get('/login',[LoginController::class, 'formulario']);
Route::post('/login',[LoginController::class, 'autenticar']);
Route::post('/logout',[LoginController::class, 'logout']);


Route::get('/podcast-privado',[PodcastController::class, 'privado']);
Route::post('/podcasts/{podcastId}/favorito',[PodcastController::class, 'anadirFavorito']);
Route::post('/podcasts/{podcastId}/quitar-favorito',[PodcastController::class, 'quitarFavorito']);
Route::get('/podcasts/create',[PodcastController::class, 'create']);
Route::post('/podcasts',[PodcastController::class, 'store']);

Route::get('/podcasts/{id}/edit',[PodcastController::class, 'edit']);
Route::post('/podcasts/{id}/update',[PodcastController::class, 'update']);

Route::post('/podcasts/{id}/delete',[PodcastController::class, 'destroy']);
//-----------------------------------------------------------------------//

Route::get('/resumen-podcasts',[PodcastController::class, 'resumen']);
Route::get('/buscar-canciones',[SongController::class, 'buscarCanciones']);

Route::get('/acceso',[AccesoController::class, 'formulario']);
Route::post('/acceso',[AccesoController::class, 'autentificar']);
Route::post('/salir',[AccesoController::class, 'salir']);
Route::get('/zona-podcast',[PodcastController::class, 'zona']);

Route::get('/crear-cancion',[SongController::class, 'create']);
Route::post('/crear-cancion',[SongController::class, 'store']);

Route::get('/podcasts/{id}',[PodcastController::class, 'show']); 

Route::get('/catalogo-canciones',[SongController::class, 'catalogo']); 

Route::get('/gestion-canciones',[SongController::class, 'gestion']); 
Route::post('/gestion-canciones',[SongController::class, 'store2']); 

Route::post('/gestion-canciones/{id}/update-nombre',[SongController::class, 'updateNombre']);
Route::post('/gestion-canciones/{id}/update-artista',[SongController::class, 'updateArtista']); 
Route::post('/gestion-canciones/{id}/update-podcast',[SongController::class, 'updatePodcast']); 
Route::post('/gestion-canciones/{id}/delete-cancion',[SongController::class, 'deleteCancion']);
Route::get('/gestion-canciones/{id}',[SongController::class, 'showDetalles']);  //la ruta variable general-> al fondo  