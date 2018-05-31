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
    
    @yield('csspage')

</head>
<body>
	<!-- HEADER -->
	<header class="header">
		<div class="grid-container center-full">
			<!-- Logo -->
			<div class="box-logo">
				<a href="{{ route('index') }}" title="Biblioteka Digital">
					<img src="{{ asset('images/biblioteca-digital-logo.png')}}" alt="Biblioteka Digital" class="logo-img">
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
	
	@yield('content')
	
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
							<img src="{{ asset('images/icones/icon-facebook.png')}}" alt="Facebok Biblioteka Digital">
						</a>
					</div>
					<div class="item instagram">
						<a href="#" title="Instagram Biblioteka Digital">
							<img src="{{ asset('images/icones/icon-instagram.png')}}" alt="Instagram Biblioteka Digital">
						</a>
					</div>
					<div class="item youtube">
						<a href="#" title="YouTube Biblioteka Digital">
							<img src="{{ asset('images/icones/icon-youtube.png')}}" alt="YouTube Biblioteka Digital">
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="{{ asset('js/vendor/jquery.js') }}"></script>
	<script src="{{ asset('js/vendor/what-input.js') }}"></script>
	<script src="{{ asset('js/vendor/foundation.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
