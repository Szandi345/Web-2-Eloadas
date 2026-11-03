<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Pizza rendelés - Pöpec Pizza</title>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class="is-preload">

<div id="wrapper">

    <div id="main">
        <div class="inner">

            <header id="header">
                <a href="{{ url('/') }}" class="logo">
                    <strong>Pöpec Pizza</strong>
                </a>
            </header>

            <section>

                <header class="main">
                    <h1>🍕 Pizza rendelés</h1>
                </header>

                <p>
                    Üdvözlünk,
                    <strong>{{ auth()->user()->name }}</strong>!
                </p>

                <p>
                    Válaszd ki a kedvenc pizzádat, add meg a darabszámot,
                    majd kattints a rendelés leadása gombra!
                </p>

                @if ($errors->any())
                    <div style="color: red;">
                        <strong>Hiba történt!</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <hr class="major" />

                <form method="POST" action="{{ route('rendeles.store') }}">

                    @csrf

                    <div class="row gtr-uniform">

                        <div class="col-12">
                            <label for="pizzaid">Pizza kiválasztása</label>

                            <select name="pizzaid" id="pizzaid" required>

                                <option value="">
                                    -- Válassz pizzát --
                                </option>

                                @foreach ($pizzak as $pizza)

                                    <option
                                        value="{{ $pizza->pizzaid }}"
                                        {{ old('pizzaid') == $pizza->pizzaid ? 'selected' : '' }}
                                    >
                                        {{ $pizza->nev }}
                                        ({{ $pizza->kategorianev }})
                                        -
                                        {{ number_format($pizza->ar, 0, ',', ' ') }} Ft
                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div class="col-12">
                            <label for="darab">Darabszám</label>

                            <input
                                type="number"
                                name="darab"
                                id="darab"
                                value="{{ old('darab', 1) }}"
                                min="1"
                                max="100"
                                required
                            />
                        </div>

                        <div class="col-12">

                            <ul class="actions">
                                <li>
                                    <button type="submit" class="primary">
                                        🍕 Rendelés leadása
                                    </button>
                                </li>

                                <li>
                                    <a href="{{ url('/') }}" class="button">
                                        Vissza a főoldalra
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </form>

            </section>

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