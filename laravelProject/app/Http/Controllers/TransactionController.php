<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user')->get(); // Összes tranzakció lekérése a kapcsolódó felhasználókkal
        return response()->json($transactions, 200); // JSON válasz
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction = Transaction::create($request->only('user_id', 'total_amount', 'transaction_date'));

        return response()->json($transaction, 201); // Új tranzakció létrehozása és visszaküldése
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::with('user')->find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Tranzakció nem található'], 404); // Hibaüzenet, ha nem létezik
        }

        return response()->json($transaction, 200); // Tranzakció visszaküldése
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Tranzakció nem található'], 404); // Hibaüzenet
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update($request->only('user_id', 'total_amount', 'transaction_date'));

        return response()->json($transaction, 200); // Frissített tranzakció visszaküldése
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Tranzakció nem található'], 404); // Hibaüzenet
        }

        $transaction->delete(); // Tranzakció törlése

        return response()->json(['message' => 'Tranzakció sikeresen törölve'], 200); // Sikerüzenet
    }
}
