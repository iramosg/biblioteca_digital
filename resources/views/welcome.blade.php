<!doctype html>
<html class="no-js" lang="pt-BR" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Biblioteka Digital | Homepage</title>

	<!-- Estilos -->

	<!-- Foundation -->
	<link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- Fonte Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<!-- Biblioteka Digital -->
	<link rel="stylesheet" href="{{ asset('css/custom/homepage.css') }}">
</head>
<body>
	<!-- HEADER -->
	<header class="header">
		<div class="grid-container center-full">
			<!-- Logo -->
			<div class="box-logo">
				<a href="index.php" title="Biblioteka Digital">
					<img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
				</a>
				<h1 class="no-text logo-txt">Biblioteka Digital</h1>
			</div>

			<!-- Menu Centro -->
			<div class="top-bar-left" id="responsive-menu">
				<ul class="menu">
					<li class="item-menu"><a href="#" class="link ebook" title="Ebooks"><i class="fas fa-book"></i> Ebooks</a></li>
					<li class="item-menu"><a href="#" class="link editor" title="Conheça o Editor"><i class="fas fa-pencil-alt"></i> Conheça o Editor</a></li>
					<li class="item-menu"><a href="#" class="link leitor" title="Conheça o Leitor"><i class="fas fa-id-card"></i> Conheça o Leitor</a></li>
				</ul>
			</div>

			<!-- Menu Direita -->			
			<div class="top-bar-right">
				<ul class="menu">
					<li class="item-menu"><a href="{{ route('login.cadastrar') }}" class="link cadastro" title="Cadastre-se">Cadastre-se</a></li>
					<li class="item-menu"><a href="{{ route('login.index') }}" class="link entrar" title="Entrar">Entrar</a></li>
				</ul>
			</div>

			<!-- Mobile Toggle Menu -->
			<div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
				<button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
				<div class="title-bar-title">Menu</div>
			</div>
		</div>
	</header>

	<!-- CONTEUDO -->
	<section id="homepage">

		<!-- Apresentacao -->
		<section class="bg-full">
			<div class="grid-container">
			@isset(Auth::user()->nome)
			<h1>Bem-vindo, {{ Auth::user()->nome }}</h1>
			@endisset
				<div class="box-categorias">
					<div class="item animais">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/animais.png" alt="Animais">
							<p class="title-categ">Animais</p>
						</a>
					</div>
					<div class="item business">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/business.png" alt="Business">
							<p class="title-categ">Business</p>
						</a>
					</div>
					<div class="item culinaria">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/culinaria.png" alt="Culinária">
							<p class="title-categ">Culinária</p>
						</a>
					</div>
					<div class="item cursos">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/cursos.png" alt="Cursos">
							<p class="title-categ">Cursos</p>
						</a>
					</div>
					<div class="item educacionais">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/educacionais.png" alt="Educacionais">
							<p class="title-categ">Educacionais</p>
						</a>
					</div>
					<div class="item estilo-vida">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/estilo-vida.png" alt="Estilo de Vida">
							<p class="title-categ">Estilo de Vida</p>
						</a>
					</div>
					<div class="item historia">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/historias.png" alt="Histórias">
							<p class="title-categ">Histórias</p>
						</a>
					</div>
					<div class="item idiomas">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/linguas.png" alt="Idiomas">
							<p class="title-categ">Idiomas</p>
						</a>
					</div>
					<div class="item mais-vendidos">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/mais-vendidos.png" alt="Mais Vendidos">
							<p class="title-categ">Mais Vendidos</p>
						</a>
					</div>
					<div class="item outros">
						<a href="#" class="link-categ">
							<img src="images/homepage/icons/outros.png" alt="Outros">
							<p class="title-categ">Outros</p>
						</a>
					</div>
				</div>

				<div class="box-cta">
					<a href="#" class="btn-cta">Conheça a Plataforma</a>
				</div>
			</div>
		</section>
	</section>

	<!-- FOOTER -->
	<footer>
		<div class="grid-container">
			<div class="copyright">
				<p class="txt-copyright">
					© Biblioteka Digital - 2018 - Todos os Direitos Reservados
				</p>

				<div class="box-sociais">
					<div class="item facebook">
						<a href="#" title="Facebook Biblioteka Digital">
							<img src="images/homepage/icons/icon-facebook.png" alt="Facebok Biblioteka Digital">
						</a>
					</div>
					<div class="item instagram">
						<a href="#" title="Instagram Biblioteka Digital">
							<img src="images/homepage/icons/icon-instagram.png" alt="Instagram Biblioteka Digital">
						</a>
					</div>
					<div class="item youtube">
						<a href="#" title="YouTube Biblioteka Digital">
							<img src="images/homepage/icons/icon-youtube.png" alt="YouTube Biblioteka Digital">
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/what-input.js"></script>
	<script src="js/vendor/foundation.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
