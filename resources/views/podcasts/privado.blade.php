@extends ('layouts.app')

@section('tittle', 'Podcast privado')

@section('content')
    <h1>Listado de podcasts</h1>

    <p>Usuario logueado: {{ $userName }}</p>
    <p>Total de podcasts: {{ $total }}</p>
    <p>Total de favoritos: {{ $user->podcasts->count() }}</p>

    @if ($podcasts->isEmpty())
        <p>No hay podcasts disponibles.</p>

    @else
        <ul>
            @foreach ($podcasts as $podcast)
                <li>
                    @if ($user->podcasts->contains($podcast->id))
                        {{-- <span style="color: #e74c3c;">&#10084;</span> --}}
                        <form action="{{ url('/podcasts/' .$podcast->id.'/quitar-favorito') }}" method="POST" style="display:inline">
                        @csrf
                        <Button type="submit" style="border: none; background: none; cursor: pointer; color: #e74c3c">
                            &#10084;
                        </Button>
                        </form>
                    @else
                        {{-- <span style="color: #f0e6c5;">&#10084;</span> --}}
                        <form action="{{ url('/podcasts/' .$podcast->id.'/favorito') }}" method="POST" style="display:inline">
                            @csrf
                            <Button type="submit" style="border: none; background: none; cursor: pointer; color: #f0e6c5">
                                &#10084;
                            </Button>
                            </form>
                    @endif
                    {{ $podcast->titulo }} - {{ $podcast->autor }}
                </li>

            @endforeach
        </ul>
    @endif

    <form action="{{ url('/logout') }}" method="POST">
        @csrf

        <button type="submit">Cerrar sesión</button>
    </form>
@endsection