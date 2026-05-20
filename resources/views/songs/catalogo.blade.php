@extends('layouts.app')

@section('title', 'Catálogo de canciones')
    
@section('content')
<h1>Catálogo de canciones</h1>

<form action="{{ url('/catalogo-canciones') }}" method="GET">
<label for="texto">Nombre de la canción:</label>
<input type="text" name="texto" id="texto" value="{{ $texto }}">{{-- value conserva texto introducido  --}}
<button type="submit">Buscar</button>
</form>

<div>
    {{-- Si no hay resultados con la busqueda INTRODUCIDA en $texto --}}
    @if ($songs->isEmpty() && $texto != '')
        <p>No hay canciones que coincidan con la búsqueda.</p>
        
    @else
        <p>Resultados: {{ $totalCanciones }}</p>
        <ul>
            @foreach ($songs as $song)
                <li>
                    <strong>{{ $song->nombre }}</strong> - {{ $song->artista }}
                    <br>
                    Podcast: <a href="{{ url('/podcasts/'.$song->podcast->id) }}">{{ $song->podcast->titulo }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection