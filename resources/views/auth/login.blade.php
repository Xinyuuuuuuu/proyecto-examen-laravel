@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection