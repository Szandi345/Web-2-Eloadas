
<!DOCTYPE HTML>
<html>
<head>
    <title>Kapcsolat - Pöpec Pizza</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class="is-preload">

<div id="wrapper">

    <!-- Fő tartalom -->
    <div id="main">
        <div class="inner">

            <!-- Fejléc -->
            <header id="header">
                <a href="/" class="logo">
                    <strong>Pöpec Pizza</strong>
                </a>
            </header>

            <!-- Kapcsolat űrlap -->
            <section>
                <header class="major">
                    <h1>Kapcsolat</h1>
                </header>

                <p>
                    Kérdésed vagy észrevételed van?
                    Vedd fel velünk a kapcsolatot!
                    Örömmel válaszolunk.
                </p>

                <!-- Sikeres küldés -->
                @if(session('siker'))
                    <div class="box">
                        <p style="color: green;">
                            {{ session('siker') }}
                        </p>
                    </div>
                @endif

                <!-- Hibák -->
                @if($errors->any())
                    <div class="box">
                        <h3>Hiba történt!</h3>
                        <ul>
                            @foreach($errors->all() as $hiba)
                                <li>{{ $hiba }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('kapcsolat.kuldes') }}">

                    @csrf

                    <div class="fields">

                        <div class="field">
                            <label for="nev">Név</label>
                            <input
                                type="text"
                                name="nev"
                                id="nev"
                                value="{{ old('nev') }}"
                                placeholder="Teljes neved"
                            />
                        </div>

                        <div class="field">
                            <label for="email">E-mail cím</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                placeholder="pelda@email.com"
                            />
                        </div>

                        <div class="field">
                            <label for="targy">Tárgy</label>
                            <input
                                type="text"
                                name="targy"
                                id="targy"
                                value="{{ old('targy') }}"
                                placeholder="Üzenet tárgya"
                            />
                        </div>

                        <div class="field">
                            <label for="uzenet">Üzenet</label>
                            <textarea
                                name="uzenet"
                                id="uzenet"
                                rows="6"
                                placeholder="Ide írd az üzeneted..."
                            >{{ old('uzenet') }}</textarea>
                        </div>

                    </div>

                    <ul class="actions">
                        <li>
                            <button type="submit" class="primary">
                                Üzenet küldése
                            </button>
                        </li>
                    </ul>

                </form>
            </section>

        </div>
    </div>

    <!-- Oldalsáv -->
    <div id="sidebar">
        <div class="inner">

            <a href="{{ route('register') }}"
               class="button big"
               style="width: 200px;">
                Regisztráció
            </a>

            <br>

            <a href="{{ route('login') }}"
               class="button big"
               style="width: 200px;">
                Bejelentkezés
            </a>

            <nav id="menu">
                <header class="major">
                    <h2>Menü</h2>
                </header>

                <ul>
                    <li><a href="/">Főoldal</a></li>

                    <li>
                        <span class="opener">Adatbázis</span>
                        <ul>
                            <li><a href="/kategoriaread">Kategória tábla</a></li>
                            <li><a href="/pizzaread">Pizza tábla</a></li>
                            <li><a href="/rendelesread">Rendelés tábla</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>

                    @if(Auth::check())
                        <li><a href="/uzenetek">Üzenetek</a></li>
                    @endif

                    <li><a href="/diagram">Diagram</a></li>

                    @if(Auth::check() && Auth::user()->role == 1)
                        <li><a href="/crud">CRUD Menü</a></li>
                    @endif
                </ul>
            </nav>

            <!-- Elérhetőségek -->
            <section>
                <header class="major">
                    <h2>Adataink</h2>
                </header>

                <ul class="contact">
                    <li class="icon solid fa-envelope">
                        <a href="mailto:popecpizza@gmail.com">
                            popecpizza@gmail.com
                        </a>
                    </li>

                    <li class="icon solid fa-phone">
                        +36 01 123 4567
                    </li>

                    <li class="icon solid fa-home">
                        Pizza utca 23.<br>
                        Kecskemét, 6000
                    </li>
                </ul>
            </section>

            <!-- Lábléc -->
            <footer id="footer">
                <p class="copyright">
                    Pöpec Pizza<br>
                    Projektfeladatot készítette:<br>
                    Laucsik Dominik (DILLSZ)<br>
                    Sztroka Alexandra Laura (G34R4F)
                </p>
            </footer>

        </div>
    </div>

</div>

<!-- JavaScript fájlok -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
