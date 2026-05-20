@extends('layouts.app')

@section('title', 'Gestion de canciones')
@section('content')
    <h1>Gestión de canciones</h1>

    <form action="{{ url('/gestion-canciones') }}" method="GET">
        <label for="texto">Buscador:</label>
        <input type="text" name="texto" id="texto" value="{{ $texto }}" placeholder="Nombre de la canción">
        <button type="submit">Buscar</button>
    </form>
    <br>
    {{-- Errores de validación de create --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- Errores con with() --}}
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ url('/gestion-canciones') }}" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        </div>

        <div>
            <label for="artista">Artista:</label>
            <input type="text" name="artista" id="artista" value="{{ old('artista') }}">
        </div>

        <select name="podcast_id" id="podcast_id" >
            @foreach ($podcasts as $podcast)
                {{-- opt con seleccion conservada --}}
                <option value="{{ $podcast->id }}" @if(old('podcast_id') == $podcast->id) selected @endif>
                    {{ $podcast->titulo }}
                </option>
            @endforeach
        </select>

        <button type="submit">Crear</button>
    </form>

    <div>
        @if ($songs->isEmpty() && $texto != '')
            <p>No se han encontrado canciones.</p>
        @else
            <p>Resultados: {{ $totalCanciones}}</p>

            <ul>
                @foreach ($songs as $song)
                    <li>
                        <strong>{{ $song->nombre }}</strong> - {{ $song->artista }}
                        <br>
                        Podcast: <a href="{{ url('/podcasts/' . $song->podcast->id) }}"> {{$song->podcast->titulo  }}</a>
                        <a href="{{ url('/gestion-canciones/' . $song->id) }}">Más detalles</a>
                    </li>
                @endforeach
            </ul>


        @endif
    </div>
@endsection