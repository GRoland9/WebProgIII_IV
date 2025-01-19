<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all(); // Összes termék lekérése
        return view('products.index', compact('products')); // Adatok átadása a nézetnek
    }

    public function create()
    {
        return view('products.create'); // Nézet az új termék létrehozására
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all()); // Új termék mentése

        return redirect()->route('products.index')->with('success', 'Termék sikeresen létrehozva!');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id); // Termék lekérése ID alapján
        return view('products.show', compact('product')); // Nézet megjelenítése
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // Termék lekérése ID alapján
        return view('products.edit', compact('product')); // Nézet megjelenítése
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all()); // Termék frissítése

        return redirect()->route('products.index')->with('success', 'Termék sikeresen frissítve!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Termék törlése

        return redirect()->route('products.index')->with('success', 'Termék sikeresen törölve!');
    }
}
