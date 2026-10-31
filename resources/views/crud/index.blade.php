<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Pizza CRUD - Pöpec Pizza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body class="is-preload">

<div id="wrapper">

    <div id="main">
        <div class="inner">

            <header id="header">
                <a href="/" class="logo">
                    <strong>Pöpec Pizza</strong> - Adminisztráció
                </a>
            </header>

            <section>
                <header class="major">
                    <h2>🍕 Pizzák kezelése (CRUD)</h2>
                </header>
                @if (session('success'))
                    <div style="color: green; font-weight: bold; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif
                <p>
                    Ezen az oldalon az adminisztrátor kezelheti
                    az adatbázisban található pizzákat.
                </p>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Azonosító</th>
                                <th>Pizza neve</th>
                                <th>Kategória</th>
                                <th>Vegetáriánus</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($pizzak as $pizza)
                                <tr>
                                    <td>{{ $pizza->pizzaid }}</td>
                                    <td>{{ $pizza->nev }}</td>
                                    <td>{{ $pizza->kategorianev }}</td>
                                    <td>
                                        {{ $pizza->vegetarianus ? 'Igen' : 'Nem' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        Nincs pizza az adatbázisban.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </section>

        </div>
    </div>

    <div id="sidebar">
        <div class="inner">

            <nav id="menu">
                <header class="major">
                    <h2>Menü</h2>
                </header>

                <ul>
                    <li><a href="/">Főoldal</a></li>
                    <li><a href="/kategoriaread">Kategóriák</a></li>
                    <li><a href="/pizzaread">Pizzák</a></li>
                    <li><a href="/rendelesread">Rendelések</a></li>
                    <li><a href="/kapcsolat">Kapcsolat</a></li>
                    <li><a href="/diagram">Diagram</a></li>
                    <li><a href="/crud">CRUD</a></li>
                </ul>
            </nav>

        </div>
    </div>

</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>