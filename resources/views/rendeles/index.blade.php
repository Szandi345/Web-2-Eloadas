<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Saját rendeléseim - Pöpec Pizza</title>
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
                    <h1>Saját rendeléseim</h1>
                </header>

                <p>
                    Üdvözlünk,
                    <strong>{{ auth()->user()->name }}</strong>!
                </p>

                <p>
                    Itt megtekintheted a korábban leadott rendeléseidet.
                </p>

                @if ($rendelesek->isEmpty())

                    <p>
                        Még nem adtál le rendelést.
                    </p>

                    <a href="{{ route('rendeles.create') }}"
                       class="button primary">
                        Első rendelésem leadása
                    </a>

                @else

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Rendelés ID</th>
                                    <th>Pizza</th>
                                    <th>Kategória</th>
                                    <th>Darab</th>
                                    <th>Egységár</th>
                                    <th>Végösszeg</th>
                                    <th>Időpont</th>
                                    <th>Művelet</th>
                                    <th>Állapot</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($rendelesek as $rendeles)
                                    <tr>
                                        <td>#{{ $rendeles->rendelesid }}</td>

                                        <td>{{ $rendeles->pizzanev }}</td>

                                        <td>{{ $rendeles->kategorianev }}</td>

                                        <td>{{ $rendeles->darab }} db</td>

                                        <td>
                                            {{ number_format($rendeles->ar, 0, ',', ' ') }} Ft
                                        </td>

                                        <td>
                                            <strong>
                                                {{ number_format($rendeles->ar * $rendeles->darab, 0, ',', ' ') }} Ft
                                            </strong>
                                        </td>

                                        <td>{{ $rendeles->felvetel }}</td>

                                        <td>
                                            <a href="{{ route('rendeles.show', $rendeles->rendelesid) }}"
                                               class="button small">
                                                Részletek
                                            </a>
                                        </td>
                                        
                                        <td>
                                            @if(\Carbon\Carbon::parse($rendeles->felvetel)->addMinutes(15)->isPast())
                                                <strong style="color: green;">
                                                    Kiszállítva
                                                </strong>
                                            @else
                                                <strong style="color: orange;">
                                                    Megrendelve
                                                </strong>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="{{ route('rendeles.create') }}"
                       class="button primary">
                        Új rendelés leadása
                    </a>

                @endif

                <hr class="major" />

                <a href="{{ url('/') }}" class="button">
                    Vissza a főoldalra
                </a>

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