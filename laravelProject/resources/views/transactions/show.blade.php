<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranzakció részletei</title>
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
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .details p {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .details span {
            font-weight: bold;
            color: var(--primary-color);
        }

        .back-link {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.8rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .back-link:hover {
            background-color: var(--secondary-color);
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
        <h1>Tranzakció részletei</h1>
        <div class="details">
            <p><span>ID:</span> {{ $transaction->id }}</p>
            <p><span>Felhasználó:</span> {{ $transaction->user->name }}</p>
            <p><span>Összeg:</span> {{ $transaction->total_amount }} Ft</p>
            <p><span>Dátum:</span> {{ $transaction->transaction_date }}</p>
        </div>

        <h2>Kapcsolódó termékek:</h2>
        @if ($transaction->products->isNotEmpty())
        <ul>
            @foreach ($transaction->products as $product)
            <li>
                <span>{{ $product->name }}</span> - Mennyiség: {{ $product->pivot->quantity }} - Részösszeg:
                {{ $product->pivot->subtotal }} Ft
            </li>
            @endforeach
        </ul>
        @else
        <p>Nincsenek kapcsolódó termékek.</p>
        @endif

        <a href="{{ route('transactions.index') }}" class="back-link">Vissza a tranzakciókhoz</a>
    </div>
</body>

</html>