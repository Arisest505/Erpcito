<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::all();
        return view('almacenes', compact('almacenes'));
    }

    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        // Crear nuevo almacén
        $almacen = new Almacen();
        $almacen->nombre = $request->nombre;
        $almacen->ubicacion = $request->ubicacion;
        $almacen->save();

        return redirect()->back()->with('success', 'Almacén creado correctamente.');
    }
}
