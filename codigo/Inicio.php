
<!DOCTYPE HTML>
<html>
<?php
        $var = "datos.ini";
		$base = parse_ini_file($var);		
		$php = new PDO($base["baseDeDatos"],$base["usuario"],$base["password"]);
        $con = $php->prepare("SELECT * FROM peliculas ORDER BY Visitas DESC");
		$con->execute();
		$registros = $con->fetchAll(PDO::FETCH_NUM);
		$php = null;		
		$n = count($registros);
        $texto = $registros[0][0];
        echo $registros[1][7];
       // print_r ($registros);
       ?>    
	<head>
		<title>Filmstar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="icon" type=image/jpg href="images/IconoPesta%C3%B1a.png">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<h1><a href="Inicio.html">Filmstar</a></h1>
						<nav class="links">
							<ul>
								<li><a href="Inicio.html">Inicio</a></li>
								<li><a href="Peliculas.html">Peliculas</a></li>
								<li><a href="#">Series</a></li>
								<li><a href="#">Mi lista</a></li>
								<li><a href="#">Ayuda</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
                                    <a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
                                <table class="perfil">
                                    <tr>
                                        <td><h3><a href="#">Name</a></h3></td>
                                        <td rowspan="2"><a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a></td>
                                    </tr>
                                    <tr>
                                        <td><p>informacion del perfil</p></td>
                                    </tr>
                                </table>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Editar perfil</h3>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Cuenta</h3>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Centro de ayuda</h3>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Cerrar sesion</h3>
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="#" class="button big fit">Cambiar de cuenta</a></li>
								</ul>
							</section>

					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>CONTENIDO MAS VISTO</h2>
										<p>Popular en Filmstar</p>
									</div>
								</header>
								<div class="slider">
                                   <ul>
                                       <li><a href="#"><img src="<?php echo $registros[0][7]?>"></a></li>
                                       <li><a href="#"><img src="<?php echo $registros[1][7]?>"></a></li>
                                       <li><a href="#"><img src="<?php echo $registros[2][7]?>"></a></li>
                                       <li><a href="#"><img src="<?php echo $registros[3][7]?>"></a></li>
                                    </ul>
                                </div>
								<footer>
									<ul class="stats">
										<li><a href="#">Ver mas</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>PELICULAS MAS VISTAS</h2>
										<p>Peliculas mas visualizadas en los ultimos dias</p>
									</div>
								</header>
								<div class="slider">
                                   <ul>
                                       <li><a href="#"><img src="images/Sonic.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/Avesdepresa.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/Joker.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/Dolittle.PNG" alt=""></a></li>
                                    </ul>
                                </div>
								<footer>
									<ul class="stats">
										<li><a href="#">Ver mas</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>SERIES MAS VISTAS</h2>
										<p>Series mas visualizadas en los ultimos dias</p>
									</div>
								</header>
								<div class="slider">
                                   <ul>
                                       <li><a href="#"><img src="images/Los100.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/StrangerThings.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/Casa%20de%20papel.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/Elite.PNG" alt=""></a></li>
                                    </ul>
                                </div>
								<footer>
									<ul class="stats">
										<li><a href="#">Ver mas</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>
                        
                        <!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>DIBUJOS ANIMADOS</h2>
										<p>Dibujos animados mas populares</p>
									</div>
								</header>
								<div class="slider">
                                   <ul>
                                       <li><a href="#"><img src="images/DragonBall.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/JonnyTest.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/AmericanDragon.PNG" alt=""></a></li>
                                       <li><a href="#"><img src="images/EntrenarDragon.PNG" alt=""></a></li>
                                    </ul>
                                </div>
								<footer>
									<ul class="stats">
										<li><a href="#">Ver mas</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="images/logo.PNG" alt="" /></a>
								<header>
									<h2>PROXIMAMENTE</h2>
									<p>Películas que se estrenan próximamente en cines</p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Avatar 2</a></h3>
												<time class="published" datetime="2015-10-20">Diciembre 16, 2021</time>
											</header>
											<a href="#" class="image"><img src="images/Avatar%202.PNG" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Deadpool 3</a></h3>
												<time class="published" datetime="2015-10-19">Octubre 19, 2022</time>
											</header>
											<a href="#" class="image"><img src="images/Deadpool3.PNG" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Sherlock Holmes 3</a></h3>
												<time class="published" datetime="2015-10-18">Diciembre 22, 2021</time>									
											</header>
											<a href="#" class="image"><img src="images/SherlockHolmes3.PNG" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Jurassic World: Dominion</a></h3>
												<time class="published" datetime="2015-10-17">Junio 10, 2021</time>
											</header>
											<a href="#" class="image"><img src="images/JurassicParck.PNG" alt="" /></a>
										</article>
                                    
                                    <!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Indiana Jones 5</a></h3>
												<time class="published" datetime="2015-10-17">Julio 8, 2021</time>
											</header>
											<a href="#" class="image"><img src="images/IndianaJones5.PNG" alt="" /></a>
										</article>

								</div>
							</section>

						<!-- Posts List -->
							<section>
                                <h2>Actores y actrices</h2>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="#">Johnny Depp</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Will Smith</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Morgan Freeman</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Robert Downey Jr.</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Dwayne Johnson</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic12.jpg" alt="" /></a>
										</article>
									</li>
                                    <li>
										<article>
											<header>
												<h3><a href="#">Adam Sandler</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
                                <ul class="actions">
									<li><a href="#" class="button">Cargar más</a></li>
								</ul>
							</section>

						<!-- About
							<section class="blurb">
								<h2>About</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
							</section>  -->

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
                                <ol class="legal">
                                    <li><a href="#"><span class="label">Política de privacidad</span></a></li>
									<li><a href="#"><span class="label">Política sobre cookies</span></a></li>
									<li><a href="#"><span class="label">Aviso Legal</span></a></li>
                                </ol>
                                <div class="flogo">
                                    <a href="#" class="image"><img src="images/LogoFilmstar.png" alt="" /></a>
                                </div> 
                                <p class="copyright">&copy; Filmstar 2020. Todos los derechos reservados.<a href="http://designscrazed.org/"></a></p>
                            </section>
					</section>
			</div>
        

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>