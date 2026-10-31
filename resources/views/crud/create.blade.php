<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Új pizza hozzáadása - Pöpec Pizza</title>
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
                    <h2>🍕 Új pizza hozzáadása</h2>
                </header>

                <p>
                    Töltsd ki az alábbi űrlapot az új pizza létrehozásához!
                </p>

                @if ($errors->any())
                    <div style="color: red;">
                        <strong>Hibás adatok!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('crud.store') }}">
                    @csrf

                    <div class="row gtr-uniform">

                        <!-- Pizza neve -->
                        <div class="col-12">
                            <label for="nev">Pizza neve:</label>
                            <input
                                type="text"
                                name="nev"
                                id="nev"
                                value="{{ old('nev') }}"
                                placeholder="Pl. Magyaros"
                                required
                            >
                        </div>

                        <!-- Kategória -->
                        <div class="col-12">
                            <label for="kategoriaid">Kategória:</label>

                            <select name="kategoriaid" id="kategoriaid" required>
                                <option value="">-- Válassz kategóriát --</option>

                                @foreach ($kategoriak as $kategoria)
                                    <option
                                        value="{{ $kategoria->kategoriaid }}"
                                        {{ old('kategoriaid') == $kategoria->kategoriaid ? 'selected' : '' }}
                                    >
                                        {{ $kategoria->nev }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Vegetáriánus -->
                        <div class="col-12">
                            <label for="vegetarianus">Vegetáriánus pizza:</label>

                            <select name="vegetarianus" id="vegetarianus" required>
                                <option value="0" {{ old('vegetarianus', '0') == '0' ? 'selected' : '' }}>
                                    Nem
                                </option>

                                <option value="1" {{ old('vegetarianus') == '1' ? 'selected' : '' }}>
                                    Igen
                                </option>
                            </select>
                        </div>

                        <!-- Gombok -->
                        <div class="col-12">
                            <ul class="actions">
                                <li>
                                    <button type="submit" class="primary">
                                        Pizza mentése
                                    </button>
                                </li>

                                <li>
                                    <a href="{{ route('crud.index') }}" class="button">
                                        Vissza
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </form>

            </section>

        </div>
    </div>

    <!-- Oldalsó menü -->
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