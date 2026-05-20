@extends('layouts.app')

@section('title', 'Zona de usuario')
@section('content')

    <h1>Zona de usuario {{ $usuario->name }}</h1>

    <form action="{{ url('/salir') }}" method="POST">
        @csrf
        <button type="submit">Salir/Logout</button>
    </form>

    <p>Hay {{ $totalPodcastsUsuario }}
        @if ($totalPodcastsUsuario == 1)
            podcast
        @else
            podcasts
        @endif
        de {{ $usuario->name }}
    </p>

    @if ($podcastsUsuario->isEmpty())
        <p>No hay podcasts disponibles</p>
    @else
        <ul>
            @foreach ($podcastsUsuario as $podcast)
                <li>{{ $podcast->titulo }}</li>
            @endforeach
        </ul>
    @endif
@endsection