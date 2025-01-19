<?php

namespace App\Http\Controllers\Api;

use App\Models\TransactionProduct;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionProducts = TransactionProduct::with(['transaction', 'product'])->get();
        return response()->json($transactionProducts, 200); // JSON válasz
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $transactionProduct = TransactionProduct::create($request->all());

        return response()->json($transactionProduct, 201); // Létrehozott kapcsolat visszaküldése
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transactionProduct = TransactionProduct::with(['transaction', 'product'])->find($id);

        if (!$transactionProduct) {
            return response()->json(['message' => 'Kapcsolat nem található'], 404);
        }

        return response()->json($transactionProduct, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transactionProduct = TransactionProduct::find($id);

        if (!$transactionProduct) {
            return response()->json(['message' => 'Kapcsolat nem található'], 404);
        }

        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $transactionProduct->update($request->all());

        return response()->json($transactionProduct, 200); // Frissített adat visszaküldése
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transactionProduct = TransactionProduct::find($id);

        if (!$transactionProduct) {
            return response()->json(['message' => 'Kapcsolat nem található'], 404);
        }

        $transactionProduct->delete();

        return response()->json(['message' => 'Kapcsolat sikeresen törölve'], 200);
    }
}
