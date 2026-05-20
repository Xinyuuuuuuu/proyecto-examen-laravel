@extends ('layouts.app')

@section('title', 'Detalles de podcasts')

@section('content')
    <h1>Detalles del podcast {{ $podcast->titulo }}</h1>
    <p>Autor: {{ $podcast->autor }}</p>

    @if ($podcast->songs->isEmpty())
        <p>Este podcast no tiene canciones asociadas.</p>

    @else
        <p>Canciones en este podcast: {{ $totalCanciones }} </p>

        <ul>
            @foreach ($podcast->songs as $song)
            <li>
                <strong>{{ $song->nombre }}</strong> - {{ $song->artista }}
            </li>
                
            @endforeach
        </ul>
    @endif



@endsection