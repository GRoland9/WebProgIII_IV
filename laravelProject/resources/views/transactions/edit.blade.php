<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranzakció szerkesztése</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Stílusok -->
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
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        form label {
            display: block;
            margin: 1rem 0 0.5rem;
            font-weight: 600;
        }

        form select,
        form input {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: var(--secondary-color);
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: var(--secondary-color);
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

            <label for="total_amount">Összeg:</label>
            <input type="number" name="total_amount" id="total_amount" value="{{ $transaction->total_amount }}" step="0.01" required>

            <label for="transaction_date">Dátum:</label>
            <input type="datetime-local" name="transaction_date" id="transaction_date" value="{{ $transaction->transaction_date->format('Y-m-d\TH:i') }}" required>

            <button type="submit">Frissítés</button>
        </form>
        <a href="{{ route('transactions.index') }}" class="back-link">Vissza a listához</a>
    </div>
</body>

</html>