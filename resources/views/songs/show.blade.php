@extends('layouts.app')
@section('title', 'Detalles de cancion')
@section('content')
    <h1>Detalles de la cancion {{ $song->nombre }}</h1>

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

    {{-- Edicion --}}
    <form action="{{ url('/gestion-canciones/' . $song->id . '/update-nombre') }}" method="POST">
        @csrf

        <p>Nombre:
            <input type="text" name="nombre" value="{{ old('nombre', $song->nombre) }}">
            <button type="submit">✏️ Actualizar</button>
        </p>

    </form>

    <form action="{{ url('/gestion-canciones/' . $song->id . '/update-artista') }}" method="POST">
        @csrf

        <p>Artista:
            <input type="text" name="artista" id="artista" value="{{ old('artista', $song->artista) }}">
            <button type="submit">✏️ Actualizar</button>
        </p>

    </form>

    <form action="{{ url('/gestion-canciones/' . $song->id . '/update-podcast') }}" method="post">
        @csrf
        <p>Podcast:
            <select name="podcast_id" id="podcast_id">
                @foreach ($podcasts as $podcast)
                    {{-- selected old podcast or current podcast--}}
                    <option value="{{ $podcast->id }}" @if(old('podcast_id', $song->podcast_id) == $podcast->id) selected @endif>
                        {{ $podcast->titulo }}
                    </option>
                @endforeach
            </select>
            <button type="submit">✏️ Actualizar</button>
        </p>
    </form>

    <form action="{{ url('/gestion-canciones/' . $song->id . '/delete-cancion') }}" method="post">
        @csrf
        <button type="submit" onclick="return confirm('¿Seguro que quieres borrar esta canción?')">
            🗑️ Borrar cancion
        </button>
    </form><br>
    <a href="{{ url('/gestion-canciones')}}">Volver</a>

    {{-- <button type="button" onclick="window.location='{{ url()->previous() }}'">
        Volver
    </button> --}}


@endsection