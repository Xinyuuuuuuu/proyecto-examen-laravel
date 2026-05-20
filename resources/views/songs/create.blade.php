@extends('layouts.app')

@section('title', 'Crear una canción')

@section('content')
    <h1>Crer una canción</h1>

    <form action="{{ url('/crear-cancion') }}" method="POST">
        @csrf

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        </div>

        <div>
            <label for="artista">Artista: </label>
            <input type="text" name="artista" id="artista" value="{{ old('artista') }}">
        </div>

        <select name="podcast_id" id="podcast_id">
            @foreach ($podcasts as $podcast)
                <option value="{{ $podcast->id }}">
                    {{ $podcast->titulo }}
                </option>
            @endforeach
        </select>
        <button type="submit">Crear</button>
    </form>
@endsection