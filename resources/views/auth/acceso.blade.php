@extends('layouts.app')

@section('title', 'Formulario de acceso')
@section('content')

    <h1>Formulario de acceso</h1>

    <form action="{{ url('/acceso') }}" method="POST">
        @csrf


        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Aceder</button>
    </form>

@endsection