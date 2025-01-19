<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékek listája</title>
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
            padding: 2rem;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
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
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        table th,
        table td {
            padding: 1rem;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: var(--primary-color);
            color: white;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .actions a,
        .actions form button {
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .actions a:hover,
        .actions form button:hover {
            background-color: var(--secondary-color);
        }

        .add-button {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-bottom: 1rem;
        }

        .add-button:hover {
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
        <h2>Termékek</h2>
        <a href="{{ route('products.create') }}" class="add-button">Új termék hozzáadása</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Ár</th>
                    <th>Készlet</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="actions">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Törlés</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>