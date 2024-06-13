<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaProductosController extends Controller
{
    public function index()
    {
        // Aquí puedes obtener datos si es necesario y pasarlos a la vista
        return view('categoria_productos');
    }
}
