@extends('layouts.app')

@section('title', 'Resumen de podcasts')

@section('content')
    <h1>Resumen de podcasts</h1>

    @if ($podcasts->isEmpty())
        <p>No hay podcasts disponibles.</p>

    @else
        <p>Total de podcasts disponibles: {{ $total }}</p>
        <ul>
            @foreach ($podcasts as $podcast)
                <div>

                    <h2>{{ $podcast->titulo }}</h2>
                    <p>Autor: {{ $podcast->autor }}</p>

                    @if ($podcast->songs->isEmpty())
                        <p>Este podcast no tiene canciones asociadas.</p>

                    @else
                        <p>Canciones:</p>
                        <ul>
                            @foreach ($podcast->songs as $song)

                                <li>{{ $song->nombre }} - {{ $song->artista }}</li>
                            @endforeach
                        </ul>

                    @endif
                </div>

            @endforeach
        </ul>

    @endif

@endsection