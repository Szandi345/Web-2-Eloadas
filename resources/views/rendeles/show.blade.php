<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Sikeres rendelés - Pöpec Pizza</title>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class="is-preload">

<div id="wrapper">

    <div id="main">
        <div class="inner">

            <!-- Fejléc -->
            <header id="header">
                <a href="{{ url('/') }}" class="logo">
                    <strong>Pöpec Pizza</strong>
                </a>
            </header>

            <!-- Rendelés visszaigazolása -->
            <section>

                <header class="main">
                    <h1>🍕 Sikeres rendelés!</h1>
                </header>

                <p>
                    Köszönjük a rendelésedet,
                    <strong>{{ auth()->user()->name }}</strong>!
                </p>

                <p>
                    A rendelésedet sikeresen rögzítettük.
                </p>

                <hr class="major" />

                <h2>Rendelés adatai</h2>

                <div class="table-wrapper">
                    <table>
                        <tbody>

                            <tr>
                                <td><strong>Rendelés azonosítója</strong></td>
                                <td>#{{ $rendeles->rendelesid }}</td>
                            </tr>

                            <tr>
                                <td><strong>Pizza neve</strong></td>
                                <td>{{ $rendeles->pizzanev }}</td>
                            </tr>

                            <tr>
                                <td><strong>Kategória</strong></td>
                                <td>{{ $rendeles->kategorianev }}</td>
                            </tr>

                            <tr>
                                <td><strong>Egységár</strong></td>
                                <td>
                                    {{ number_format($rendeles->ar, 0, ',', ' ') }} Ft
                                </td>
                            </tr>

                            <tr>
                                <td><strong>Darabszám</strong></td>
                                <td>{{ $rendeles->darab }} db</td>
                            </tr>

                            <tr>
                                <td><strong>Rendelés időpontja</strong></td>
                                <td>{{ $rendeles->felvetel }}</td>
                            </tr>

                            <tr>
                                <td><strong>Fizetendő összeg</strong></td>
                                <td>
                                    <strong>
                                        {{ number_format($vegosszeg, 0, ',', ' ') }} Ft
                                    </strong>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <hr class="major" />

                <h3>Köszönjük, hogy minket választottál! ❤️</h3>

                <p>
                    Rendelésed feldolgozás alatt áll.
                </p>

                <ul class="actions">
                    <li>
                        <a href="{{ url('/') }}" class="button primary">
                            Vissza a főoldalra
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('rendeles.create') }}" class="button">
                            Új rendelés leadása
                        </a>
                    </li>
                </ul>

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