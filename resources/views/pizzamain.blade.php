<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Pöpec Pizza</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>Pöpec Pizza</strong></a>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Mi vagyunk<br />
											a Pöpec Pizza Pizzéria</h1>
											<p>Kecskemét első számú pizzériája</p>
										</header>
										<p>2024-i nyitásunk óta több mint 20,000 vendéget kiszolgáltunk az autentikus, nápolyi stílusú pizzáinkal. Te is megkóstolod?</p>
										<ul class="actions">
											<li><a href="{{ route('rendeles.create') }}" class="button big">RENDELJ MOST!</a>
										</ul>
									</div>
									<span class="image object">
										<img src="images/pic10.jpg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<!-- <section>
									<header class="major">
										<h2>Erat lacinia</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-gem"></span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-paper-plane"></span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-rocket"></span>
											<div class="content">
												<h3>Quam lorem ipsum</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon solid fa-signal"></span>
											<div class="content">
												<h3>Sed magna finibus</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									</div>
								</section> -->

							<!-- Section -->
								 <section>
									<header class="major">
										<h2>Pizzáink</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
											<h3>Sajtos</h3>
											<p>Paradicsomos alap, sajt</p>
	<!-- 										<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul> -->
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
											<h3>Szalámis</h3>
											<p>Paradicsomos alap, sajt, szalámi</p>
<!-- 											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul> -->
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
											<h3>Csabesz</h3>
											<p>Paradicsomos alap, sajt, csirke, hagyma</p>
<!-- 											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul> -->
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
											<h3>Barbecue chicken</h3>
											<p>Barbecue szósz alap, sajt, csirke</p>
<!-- 											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul> -->
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
											<h3>Gyros pizza</h3>
											<p>Tejfölös alap, gyroshússal</p>
<!-- 											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul> -->
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
											<h3>Főnök kedvence</h3>
											<p>Tejfölös alap, sajt, tojás!</p>
<!-- 											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul> -->
										</article>
									</div>
								</section> 

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
                            <a href="{{ route('register') }}" class="button big" style="width: 200px;">
                                Regisztráció
                            </a>
                        <br>
						@if (Auth::check())
						    <form method="POST" action="{{ route('logout') }}" >
								@csrf
                            	<button type="submit" class="button big" style="width: 200px;">Kijelentkezés</button>
							</form>
						@else
							<a href="{{ route('login') }}" class="button big" style="width: 200px;">
                                Bejelentkezés
                            </a>
						@endif
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
										
                                        @auth
											@if(auth()->user()->role == 1)
												<li>
													<a href="{{ route('uzenetek') }}">
														Üzenetek
													</a>
												</li>
											@endif
										@endauth                              
                                        <li><a href="diagram">Diagram</a></li>
                                        @if (Auth::check())
                                         @if (Auth::User()->role==1)
										    <li><a href="{{ route('crud.index') }}">🍕 Pizzák kezelése (CRUD)</a>
											</li>

											<li><a href="{{ route('admin.rendelesek') }}">📋 Beérkezett rendelések</a>
											</li>   
                                         @endif
                                        @endif
								
									</ul>
								</nav>

							<!-- Section -->
								<!-- <section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section> -->

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Adataink</h2>
									</header>
									
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">popecpizza@gmail.com</a></li>
										<li class="icon solid fa-phone">+36 01 123 4567</li>
										<li class="icon solid fa-home">Pizza utca 23.<br />
										Kecskemét, 6000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>. <br> Projektfeladatot készítette: <br> Laucsik Dominik (DILLSZ) <br> Sztroka Alexandra Laura (G34R4F)</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>