<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranzakciók listája</title>
</head>

<body>
    <h1>Tranzakciók</h1>
    <a href="{{ route('transactions.create') }}">Új tranzakció hozzáadása</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Felhasználó</th>
                <th>Összeg</th>
                <th>Dátum</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->total_amount }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>
                    <a href="{{ route('transactions.show', $transaction->id) }}">Megtekintés</a>
                    <a href="{{ route('transactions.edit', $transaction->id) }}">Szerkesztés</a>
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>