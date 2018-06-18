<!doctype html>
<html class="no-js" lang="pt-BR" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Biblioteka Digital | @yield('titlepage')</title>
	
	<!-- Estilos -->
	
	<!-- Foundation -->
	<link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	
	<!-- Fonte Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	
	@yield('csspage')

	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
	
</head>
<body class="{{ $classpage }}">

@include('partials.menu')
	
	
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
	<script src="{{ asset('js/owl/owl.carousel.js')}}"></script>
	<script src="{{ asset('js/custom/jquery.validate.min.js')}}"></script>
	<script src="{{ asset('js/custom/jquery.mask.min.js')}}"></script>
	<script src="{{ asset('js/custom/localization/messages_pt_BR.js')}}"></script>
	
	<script type="text/javascript">
	@yield('jspage')

	</script>
	
	@yield('script')

	
</body>
</html>
