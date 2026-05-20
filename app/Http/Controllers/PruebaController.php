<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /*     public function saludo () {
        return "Hola desde controlador";
    */
    public function saludo()
    {
        return view('saludo');
    }

    public function bienvenida()
    {
        return view('bienvenida');
    }

    public function podcast()
    {
        return view('podcast');
    }

}
