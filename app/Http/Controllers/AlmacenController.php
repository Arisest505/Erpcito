<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la vista de almacenes
        return view('almacenes');
    }

    public function crear(Request $request)
    {
        // Lógica para crear un nuevo almacén
    }
}
