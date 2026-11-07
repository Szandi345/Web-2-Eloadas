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
		@guest
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
		@endguest

		@auth
			<form method="POST" action="{{ route('logout') }}">
				@csrf

				<button type="submit"
						class="button big"
						style="width: 200px;">
					Kijelentkezés
				</button>
			</form>
		@endauth

			<!-- Menu -->
				<nav id="menu">
					<header class="major">
						<h2>Menü</h2>
					</header>
					<ul>
                        <li><a href="/">Főoldal</a></li>
						@auth
						<li><a href="{{ route('rendeles.read') }}">Saját rendeléseim</a>
						</li>
						@endauth
						<li>
							<span class="opener">Adatbázis</span>
							<ul>
								<li><a href="kategoriaread">Kategória tábla</a></li>
								<li><a href="pizzaread">Pizza tábla</a></li>
								<li><a href="rendelesread">Rendelés tábla</a></li>
							</ul>
						</li>
						<li><a href="kapcsolat">Kapcsolat</a></li>
						                             
                        <li><a href="diagram">Diagram</a></li>
                        @if (Auth::check())
                            @if (Auth::User()->role==1)
							<li><a href="{{ route('crud.index') }}">🍕 Pizzák kezelése (CRUD)</a>
							</li>

							<li><a href="{{ route('admin.rendelesek') }}">📋 Beérkezrendelések</a>
							</li>   
                         @endif
                        @endif
								
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
                    Projektfeladatot készítette: <br> Laucsik Dominik (DILLSZ) <br> Sztroka Alexandra Laura (G34R4F)
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