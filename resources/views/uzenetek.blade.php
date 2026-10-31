<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Üzenetek - Pöpec Pizza</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class="is-preload">

<div id="wrapper">

    <!-- Fő tartalom -->
    <div id="main">
        <div class="inner">

            <!-- Fejléc -->
            <header id="header">
                <a href="{{ url('/') }}" class="logo">
                    <strong>Pöpec Pizza</strong> Pizzéria
                </a>
            </header>

            <!-- Üzenetek -->
            <section>
                <header class="main">
                    <h1>Beérkezett üzenetek</h1>
                </header>

                <p>
                    Az alábbi táblázatban a kapcsolatfelvételi űrlapon
                    beküldött üzenetek láthatók.
                    A legújabb üzenetek jelennek meg legfelül.
                </p>

                @if($uzenetek->isEmpty())

                    <div class="box">
                        <p>Még nem érkezett üzenet.</p>
                    </div>

                @else

                    <div class="table-wrapper">
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>Név</th>
                                    <th>E-mail cím</th>
                                    <th>Tárgy</th>
                                    <th>Üzenet</th>
                                    <th>Beküldés időpontja</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($uzenetek as $uzenet)
                                    <tr>
                                        <td>{{ $uzenet->nev }}</td>
                                        <td>{{ $uzenet->email }}</td>
                                        <td>{{ $uzenet->targy }}</td>
                                        <td>{{ $uzenet->uzenet }}</td>
                                        <td>
                                            {{ $uzenet->created_at->format('Y.m.d. H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif

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
                    <li><a href="{{ url('/') }}">Főoldal</a></li>

                    <li>
                        <span class="opener">Adatbázis</span>
                        <ul>
                            <li><a href="{{ url('/kategoriaread') }}">Kategóriák</a></li>
                            <li><a href="{{ url('/pizzaread') }}">Pizzák</a></li>
                            <li><a href="{{ url('/rendelesread') }}">Rendelések</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>

                    @auth
                        <li>
                            <a href="{{ route('uzenetek') }}">
                                Üzenetek
                            </a>
                        </li>
                    @endauth

                    <li><a href="{{ url('/diagram') }}">Diagram</a></li>

                    @if(Auth::check() && Auth::user()->role == 1)
                        <li><a href="{{ url('/crud') }}">CRUD</a></li>
                    @endif

                    @guest
                        <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
                        <li><a href="{{ route('register') }}">Regisztráció</a></li>
                    @endguest

                    @auth
                        <li><a href="{{ route('dashboard') }}">Vezérlőpult</a></li>
                    @endauth

                </ul>
            </nav>

            <!-- Elérhetőségek -->
            <section>
                <header class="major">
                    <h2>Elérhetőség</h2>
                </header>

                <p>Keress minket bizalommal!</p>

                <ul class="contact">
                    <li class="icon solid fa-envelope">
                        popecpizza@gmail.com
                    </li>

                    <li class="icon solid fa-phone">
                        +36 01 123 4567
                    </li>

                    <li class="icon solid fa-home">
                        Pizza utca 23.<br />
                        Kecskemét, 6000
                    </li>
                </ul>
            </section>

            <!-- Lábléc -->
            <footer id="footer">
                <p class="copyright">
                    &copy; Pöpec Pizza. Minden jog fenntartva.
                </p>
            </footer>

        </div>
    </div>

</div>

<!-- JavaScript -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>