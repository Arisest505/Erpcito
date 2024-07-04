<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Almacen;

class ProductController extends Controller
{
    /**
     * Muestra la vista de categoría de productos.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
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
        // Manejo de la excepción, como registrarla o mostrar un mensaje de error
        dd($e->getMessage()); // Esto mostrará el mensaje de la excepción
    }
}


    /**
     * Muestra la lista de productos.
     *
     * @return \Illuminate\View\View
     */

     public function index(Request $request)
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

             // Verificar si se realizó una búsqueda
             $searchPerformed = $request->has('almacen') || $request->has('categoria') || $request->has('nombre');

             return view('stock', [
                 'products' => $products,
                 'categories' => $categories,
                 'almacenes' => $almacenes,
                 'selected_almacen' => $almacen_id,
                 'selected_categoria' => $categoria,
                 'selected_nombre' => $nombre,
                 'searchPerformed' => $searchPerformed,
             ]);
         } catch (\Exception $e) {
             // Manejo de la excepción, como registrarla o mostrar un mensaje de error
             dd($e->getMessage()); // Esto mostrará el mensaje de la excepción
         }
     }


    /**
     * Procesa la búsqueda de productos con filtros.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
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
            $nombres = Product::select('name')->distinct()->get();

            return view('stock', [
                'products' => $products,
                'categories' => $categories,
                'almacenes' => $almacenes,
                'nombres' => $nombres,
                'selected_almacen' => $almacen_id,
                'selected_categoria' => $categoria,
                'selected_nombre' => $nombre
            ]);
        } catch (\Exception $e) {
            // Manejo de la excepción, como registrarla o mostrar un mensaje de error
            dd($e->getMessage()); // Esto mostrará el mensaje de la excepción
        }
    }
}
