<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $category_id = $request->input('category_id');

            if ($category_id) {
                // Filtrar productos por categoría
                $products = Product::with('category')->where('category_id', $category_id)->get();
            } else {
                // Obtener todos los productos
                $products = Product::with('category')->get();
            }

            $categories = Category::all(); // Para el filtro de categorías

            return view('categoria_productos', ['products' => $products, 'categories' => $categories, 'selected_category_id' => $category_id]);
        } catch (\Exception $e) {
            // Manejo de la excepción, como registrarla o mostrar un mensaje de error
            dd($e->getMessage()); // Esto mostrará el mensaje de la excepción
        }
    }
}
