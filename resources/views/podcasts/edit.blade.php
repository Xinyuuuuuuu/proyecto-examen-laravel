@extends('layouts.app')

@section('title', 'Editar podcast')

@section('content')
    <h1>Editar podcast</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form action="{{ url('/podcasts/' . $podcast->id . '/update') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" value="{{old('titulo', $podcast->titulo)}}">
        </div>

        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="{{old('autor', $podcast->autor)}}">
        </div>

        <button type="submit">Actualizar podcast</button>
    </form>
@endsection