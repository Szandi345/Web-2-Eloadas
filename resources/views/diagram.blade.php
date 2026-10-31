<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>Diagram - Pöpec Pizza</title>
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

            <!-- Diagram -->
            <section>
                <header class="main">
                    <h1>Pizzák kategóriánként</h1>
                </header>

                <p>
                    Az alábbi diagram megmutatja, hogy a Pöpec Pizza
                    kínálatában hány pizza tartozik az egyes kategóriákhoz.
                    Az adatok közvetlenül az adatbázisból származnak.
                </p>

                <div class="box">
                    <h2>Pizzák száma kategóriánként</h2>

                    <div style="position: relative; width: 100%; height: 400px;">
                        <canvas id="pizzaDiagram"></canvas>
                    </div>
                </div>

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
                            <a href="{{ route('uzenetek') }}">Üzenetek</a>
                        </li>
                    @endauth

                    <li><a href="{{ route('diagram') }}">Diagram</a></li>

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

<!-- Editorial JavaScript -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Chart.js könyvtár -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Diagram létrehozása -->
<script>
    const kategoriak = @json($kategoriak);
    const darabszamok = @json($darabszamok);

    const diagram = document.getElementById('pizzaDiagram');

    new Chart(diagram, {
        type: 'bar',

        data: {
            labels: kategoriak,

            datasets: [{
                label: 'Pizzák száma',
                data: darabszamok,
                backgroundColor: [
                    'rgba(231, 76, 60, 0.7)',
                    'rgba(241, 196, 15, 0.7)',
                    'rgba(46, 204, 113, 0.7)',
                    'rgba(52, 152, 219, 0.7)'
                ],
                borderColor: [
                    'rgba(231, 76, 60, 1)',
                    'rgba(241, 196, 15, 1)',
                    'rgba(46, 204, 113, 1)',
                    'rgba(52, 152, 219, 1)'
                ],
                borderWidth: 1
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },

                title: {
                    display: true,
                    text: 'Pizzák eloszlása kategóriánként'
                }
            },

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Pizzák száma (db)'
                    }
                },

                x: {
                    title: {
                        display: true,
                        text: 'Kategóriák'
                    }
                }
            }
        }
    });
</script>

</body>
</html>