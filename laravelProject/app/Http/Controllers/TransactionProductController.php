<?php

namespace App\Http\Controllers;

use App\Models\TransactionProduct;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionProducts = TransactionProduct::with(['transaction', 'product'])->get();
        return view('transaction_products.index', compact('transactionProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transaction_products.create', compact('transactions', 'products'));
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

        TransactionProduct::create($request->all());

        return redirect()->route('transaction-products.index')->with('success', 'Kapcsolat sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transactionProduct = TransactionProduct::with(['transaction', 'product'])->findOrFail($id);
        return view('transaction_products.show', compact('transactionProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transactionProduct = TransactionProduct::findOrFail($id);
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transaction_products.edit', compact('transactionProduct', 'transactions', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $transactionProduct = TransactionProduct::findOrFail($id);
        $transactionProduct->update($request->all());

        return redirect()->route('transaction-products.index')->with('success', 'Kapcsolat sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transactionProduct = TransactionProduct::findOrFail($id);
        $transactionProduct->delete();

        return redirect()->route('transaction-products.index')->with('success', 'Kapcsolat sikeresen törölve!');
    }
}
