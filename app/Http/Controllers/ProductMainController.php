<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Almacen;

class ProductMainController extends Controller
{
    public function index(Request $request)
    {
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

        return view('productos.index', compact('products', 'categories', 'almacenes'));
    }


    public function create()
    {
        $categories = Category::all();
        $almacenes = Almacen::all();
        return view('productos_crear', compact('categories', 'almacenes'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->unit_of_measure = $request->unit_of_measure;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->almacen_id = $request->almacen_id;
        $product->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $almacenes = Almacen::all();
        return view('productos_editar', compact('product', 'categories', 'almacenes'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->unit_of_measure = $request->unit_of_measure;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->almacen_id = $request->almacen_id;
        $product->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
