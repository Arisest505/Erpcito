<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class UnidadMedidaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $category_id = $request->input('category_id');
            $nombre = $request->input('nombre');
            $unidad = $request->input('unidad');

            $query = Product::with('category');

            if ($category_id) {
                $query->where('category_id', $category_id);
            }

            if ($nombre) {
                $query->where('name', 'like', '%' . $nombre . '%');
            }

            if ($unidad) {
                $query->where('unit_of_measure', $unidad);
            }

            $products = $query->get();
            $categories = Category::all(); // Para el filtro de categorías

            // Obtener unidades de medida únicas
            $unidades_medida = Product::select('unit_of_measure')->distinct()->get();

            // Verificar si se realizó una búsqueda
            $searchPerformed = $request->has('nombre') || $request->has('category_id') || $request->has('unidad');

            return view('unidad_medida', [
                'products' => $products,
                'categories' => $categories,
                'selected_category_id' => $category_id,
                'nombre' => $nombre,
                'unidad' => $unidad,
                'unidades_medida' => $unidades_medida,
                'searchPerformed' => $searchPerformed
            ]);
        } catch (\Exception $e) {
            // Manejo de la excepción, como registrarla o mostrar un mensaje de error
            dd($e->getMessage()); // Esto mostrará el mensaje de la excepción
        }
    }
}
