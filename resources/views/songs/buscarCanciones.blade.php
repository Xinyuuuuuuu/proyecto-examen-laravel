@extends('layouts.app')
@section('title', 'Buscador de canciones')
@section('content')
    <h1>Buscador de canciones</h1>

    <form action="{{ url('/buscar-canciones') }}" method="GET">
        <input type="text" name="texto" id="texto" value="{{ $texto }}">
        <button type="submit">Buscar</button>
    </form>


    @if ($songs->isEmpty())
        <p>No se han encontrado canciones.</p>
    @else

        <ul>
            @foreach ($songs as $song)
                <li>
                    Nombre:{{ $song->nombre }} - Artista{{ $song->artista }} - Podcast: {{ $song->podcast->titulo }}
                </li>
            @endforeach
        </ul>

    @endif

@endsection