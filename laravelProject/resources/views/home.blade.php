<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdőoldal</title>
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

        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
            text-align: center;
            padding: 0 2rem;
            background: linear-gradient(135deg, #4CAF50, #2C3E50);
            color: white;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
        }

        .hero button {
            margin-top: 1.5rem;
            padding: 0.8rem 1.5rem;
            background-color: white;
            color: var(--primary-color);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .hero button:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        footer {
            background-color: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
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

    <section class="hero">
        <div>
            <h2>Üdvözöllek a Laravel Projektben!</h2>
            <p>Egy modern költségvetési rendszer, amely megkönnyíti a tranzakciók, termékek és adatok kezelését.</p>
            <button onclick="window.location.href='{{ route('transactions.index') }}'">Kezdd el most</button>
        </div>
    </section>

    <footer>
        &copy; 2024 Laravel Projekt - Minden jog fenntartva.
    </footer>
</body>

</html>