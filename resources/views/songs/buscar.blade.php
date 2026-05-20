@extends ('layouts.app')

@section('title', 'Buscar canciones')

@section ('content')
    <h1>Buscar canciones</h1>

    <form action="{{ url('/buscar') }}" method="GET">
        <label for="texto">Nombre de la canción:</label>
        <input type="text" name="texto" id="texto" value="{{ $texto }}">
        <button type="submit">Buscar</button>
    </form>

    <hr>
    {{-- Si no hay resultados con la busqueda INTRODUCIDA en $texto --}}
    @if ($songs->isEmpty() && $texto != '')
        <p>No se han encontrado canciones.</p>
    @else
        <p>Total resultados: {{ $songs->count() }}</p>

        <ul>
            @foreach ($songs as $song)
                <li>
                    <strong>{{ $song->nombre }}</strong> - {{ $song->artista }} - Podcast: {{ $song->podcast->titulo }}
                </li>

            @endforeach
        </ul>

    @endif
@endsection