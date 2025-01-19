<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Termék Hozzáadása</title>
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

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: 600;
        }

        input,
        button {
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--secondary-color);
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 600;
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
        <h2>Új Termék Hozzáadása</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <label for="name">Termék neve</label>
            <input type="text" name="name" id="name" placeholder="Add meg a termék nevét" required>

            <label for="price">Ár</label>
            <input type="number" name="price" id="price" step="0.01" placeholder="Add meg az árat" required>

            <label for="stock">Készlet</label>
            <input type="number" name="stock" id="stock" placeholder="Add meg a készletet" required>

            <button type="submit">Hozzáadás</button>
        </form>
        <a href="{{ route('products.index') }}" class="back-link">Vissza a termékek listájához</a>
    </div>
</body>

</html>