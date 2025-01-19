<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranzakciók listája</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Alap CSS -->
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #2C3E50;
            --background-color: #F5F5F5;
            --text-color: #333;
            --font-family: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.8rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #e0e0e0;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: var(--secondary-color);
        }

        .add-button {
            display: inline-block;
            margin-bottom: 1rem;
            padding: 0.8rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .add-button:hover {
            background-color: var(--secondary-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .action-buttons a,
        .action-buttons button {
            margin-right: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .action-buttons a {
            color: white;
        }

        .view-button {
            background-color: #2196F3;
        }

        .edit-button {
            background-color: #FFC107;
        }

        .delete-button {
            background-color: #F44336;
        }

        .action-buttons a:hover,
        .action-buttons button:hover {
            opacity: 0.8;
        }

        footer {
            background-color: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Laravel Projekt</h1>
        <nav>
            <a href="{{ route('transactions.index') }}">Tranzakciók</a>
            <a href="{{ route('products.index') }}">Termékek</a>
        </nav>
    </header>

    <div class="container">
        <h1>Tranzakciók</h1>
        <a href="{{ route('transactions.create') }}" class="add-button">Új tranzakció hozzáadása</a>
        <table>
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
                    <td class="action-buttons">
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Törlés</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        &copy; 2024 Laravel Projekt - Minden jog fenntartva.
    </footer>
</body>

</html>