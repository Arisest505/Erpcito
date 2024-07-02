<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplyRule;
use App\Models\Product;

class SupplyRuleController extends Controller
{
    public function index()
    {
        $supplyRules = SupplyRule::with('product')->get();
        $products = Product::all();
        return view('regla_abastecimiento', compact('supplyRules', 'products'));
    }

    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'min_quantity' => 'required|integer|min:0',
            'max_quantity' => 'required|integer|min:0',
        ]);

        // Crear nueva regla de abastecimiento
        $supplyRule = new SupplyRule();
        $supplyRule->product_id = $request->product_id;
        $supplyRule->min_quantity = $request->min_quantity;
        $supplyRule->max_quantity = $request->max_quantity;
        $supplyRule->save();

        return redirect()->back()->with('success', 'Regla de abastecimiento creada correctamente.');
    }

    public function edit($id)
{
    $supplyRule = SupplyRule::findOrFail($id);
    $supplyRules = SupplyRule::with('product')->get();
    $products = Product::all();
    $isEditing = true; // Variable para indicar que estamos en modo de edición
    return view('regla_abastecimiento', compact('supplyRule', 'supplyRules', 'products', 'isEditing'));
}


    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'min_quantity' => 'required|integer|min:0',
            'max_quantity' => 'required|integer|min:0',
        ]);

        // Encontrar y actualizar la regla de abastecimiento existente
        $supplyRule = SupplyRule::findOrFail($id);
        $supplyRule->product_id = $request->product_id;
        $supplyRule->min_quantity = $request->min_quantity;
        $supplyRule->max_quantity = $request->max_quantity;
        $supplyRule->save();

        return redirect()->route('regla_abastecimiento')->with('success', 'Regla de abastecimiento actualizada correctamente.');
    }
    public function destroy($id)
    {
        $supplyRule = SupplyRule::findOrFail($id);
        $supplyRule->delete();

        return redirect()->route('regla_abastecimiento')->with('success', 'Regla de abastecimiento eliminada correctamente.');
    }
}
