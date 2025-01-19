<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user')->get(); // Összes tranzakció lekérése a kapcsolódó felhasználókkal
        return view('transactions.index', compact('transactions')); // Nézet átadása az adatokkal
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Felhasználók listájának lekérése
        return view('transactions.create', compact('users')); // Nézet átadása
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

        // Csak a szükséges mezők mentése
        Transaction::create($request->only('user_id', 'total_amount', 'transaction_date'));

        return redirect()->route('transactions.index')->with('success', 'Tranzakció sikeresen létrehozva!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::with('user')->findOrFail($id); // Tranzakció lekérése ID alapján
        return view('transactions.show', compact('transaction')); // Nézet megjelenítése
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id); // Tranzakció lekérése ID alapján
        $users = User::all(); // Felhasználók listájának lekérése
        return view('transactions.edit', compact('transaction', 'users')); // Nézet átadása
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all()); // Tranzakció frissítése

        return redirect()->route('transactions.index')->with('success', 'Tranzakció sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete(); // Tranzakció törlése

        return redirect()->route('transactions.index')->with('success', 'Tranzakció sikeresen törölve!');
    }
}
