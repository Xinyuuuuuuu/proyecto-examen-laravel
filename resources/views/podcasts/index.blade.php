@extends ('layouts.app')

@section('tittle', 'Listado de podcasts')

@section('content')
    <h1>Listado de podcasts</h1>

    @if ($podcasts->isEmpty())
        <p>No hay podcasts disponibles.</p>

    @else
        @if (session('success'))
            <p>{{ session('success') }}</p>        
        @endif

        @if (session('error'))
            <p>{{ session('error') }}</p>        
        @endif

        <p>Total de podcasts: {{ $total }}</p>

        <ul>
            @foreach ($podcasts as $podcast)

                <div>
                    <h1>{{ $podcast->titulo }}</h1> 
                    <p>Autor: {{ $podcast->autor }}</p>

                    <a href="{{ url('/podcasts/'.$podcast->id. '/edit') }}">Editar</a>{{-- (GET) muestra la view --}}

                    <form action="{{ url('/podcasts/'.$podcast->id.'/delete') }}" method="POST" style="display: inline"> {{-- (POST) modifica, usa form--}}
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>

                    @if ($podcast->songs->isEmpty())
                        <p>Este podcast no tiene canciones asociadas.</p>

                    @else
                        <p>Total canciones: {{ $podcast->songs->count() }}</p>

                        @if ($podcast->songs->count() > 1)
                            <p>Este podcast tiene varias canciones.</p>

                        @endif
                        
                        <ul>
                            @foreach ($podcast->songs as $song)
                                <li>{{ $song->nombre }} - {{ $song->artista }}</li>
                            @endforeach
                        </ul>

                    @endif
                        
                    <a href="{{ url('/podcasts/'.$podcast->id) }}">Ver detalles</a>
                </div>


            @endforeach
        </ul>

    @endif

@endsection