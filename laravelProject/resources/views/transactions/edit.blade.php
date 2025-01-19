<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranzakció szerkesztése</title>
</head>

<body>
    <h1>Tranzakció szerkesztése</h1>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="user_id">Felhasználó:</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $transaction->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
        <br>

        <label for="total_amount">Összeg:</label>
        <input type="number" name="total_amount" id="total_amount" value="{{ $transaction->total_amount }}" step="0.01" required>
        <br>

        <label for="transaction_date">Dátum:</label>
        <input type="datetime-local" name="transaction_date" id="transaction_date" value="{{ $transaction->transaction_date->format('Y-m-d\TH:i') }}" required>
        <br>

        <button type="submit">Frissítés</button>
    </form>
    <a href="{{ route('transactions.index') }}">Vissza a listához</a>
</body>

</html>