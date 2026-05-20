@extends('layouts.app')

@section('title', 'Crear podcast')

@section('content')
    <h1>Crear podcast</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> 
        
    @endif

    <form action="{{ url('/podcasts') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        </div>

        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}">
        </div>

        <button type="submit">Guardar podcast</button>
    </form>

@endsection