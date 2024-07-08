<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Almacen;


class ProductController extends Controller
{
    public function stock(Request $request)
    {
        try {
            $almacen_id = $request->input('almacen');
            $categoria = $request->input('categoria');
            $nombre = $request->input('nombre');

            $query = Product::with('category', 'almacen');

            if ($almacen_id) {
                $query->where('almacen_id', $almacen_id);
            }

            if ($categoria) {
                $query->whereHas('category', function ($query) use ($categoria) {
                    $query->where('name', 'like', '%' . $categoria . '%');
                });
            }

            if ($nombre) {
                $query->where('name', 'like', '%' . $nombre . '%');
            }

            $products = $query->get();
            $categories = Category::all();
            $almacenes = Almacen::all();
            $searchPerformed = $request->has('almacen') || $request->has('categoria') || $request->has('nombre');

            return view('stock', [
                'products' => $products,
                'categories' => $categories,
                'almacenes' => $almacenes,
                'selected_almacen' => $almacen_id,
                'selected_categoria' => $categoria,
                'selected_nombre' => $nombre,
                'searchPerformed' => $searchPerformed, // Asegúrate de incluir esta variable
            ]);



        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
// Método para mostrar la vista de gestión de productos

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('productos.show', ['product' => $product]);
    }
    public function categoria_productos(Request $request)
    {
        try {
            $category_id = $request->input('category_id');

            $categories = Category::all(); // Obtener todas las categorías

            // Obtener productos según la categoría seleccionada (si existe)
            $products = [];
            if ($category_id) {
                $products = Product::where('category_id', $category_id)->get();
            }

            return view('categoria_productos', [
                'categories' => $categories,
                'selected_category_id' => $category_id,
                'products' => $products,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
