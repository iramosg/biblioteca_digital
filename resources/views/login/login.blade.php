<!doctype html>
<html class="no-js" lang="pt-BR" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Biblioteka Digital | Login</title>

	<!-- CSS -->
	<!-- Foundation -->
	<link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
	<link rel="stylesheet" href="css/app.css">

	<!-- Fonte Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<!-- Biblioteka Digital -->
	<link rel="stylesheet" href="{{ asset('css/custom/login.css') }}">
</head>
<body>
	<!-- CONTEUDO -->
	<section id="login">
		<div class="grid-container">
			<div class="box-center">
				<div class="box-header gap text-center">
					<img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
				</div>

				<div class="box-login gap-big">
					<div class="cabecalho-cta gap text-center">
						<p class="h5">Seja Bem Vindo à Biblioteka Digital</p>
						<p class="h6 subheader">Preencha os Campos Abaixo para Realizar seu Login</p>
					</div>
					<form action="" method="" id="formLogin">
						<div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-user"></i></span>
							<input class="input-group-field" type="text" id="txtEmail" name="txtEmail" require>
							<label for="txtEmail" class="label-animado"><span class="obrigatorio">*</span> E-mail:</label>
							<p class="help-text danger">Por favor, digite um e-mail válido!</p>
						</div>

						<div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-lock"></i></span>
							<input class="input-group-field" type="password" id="txtSenha" name="txtSenha" require>
							<label for="txtSenha" class="label-animado"><span class="obrigatorio">*</span> Senha:</label>
						</div>
						<div class="input-group grid-x center-full">
							<div class="box-esqueceu cell small-12 large-6">
								<a href="{{ route('login.esqueciminhasenha') }}" class="btn-esqueceu btn-neutro">Esqueceu a Senha?</a>
							</div>
							<div class="box-action cell small-12 large-6">
								<input type="submit" id="btnLogin" class="btn-login btn-principal" value="Entrar">
							</div>
						</div>
					</form>
				</div>

				<div class="box-nova-conta">
					<div class="cabecalho-cta gap text-center">
						<p class="h5 uppercase">Ainda Não Possui Cadastro?!</p>
						<p class="h6 subheader">Crie sua conta sem pagar nada e comece já!
					</div>
					<div class="box-action">
						<a href="{{ route('login.cadastrar') }}" class="btn-nova-conta btn-secundario">Quero Criar Minha Conta!</a>
					</div>
				</div>
			</div>
		</div>
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

	<!-- JS -->
	<!-- Foundation -->
	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/what-input.js"></script>
	<script src="js/vendor/foundation.js"></script>
	<script src="js/app.js"></script>

	<!-- Biblioteka Digital -->
	<script type="text/javascript">

		// Anima Labels
		$(document).ready(function(){
			$("form .input-group .input-group-field").each(function(){
				$(this).bind('keydown keyup keypress blur',function(){
					if($(this).val().length > 0)
						$(this).find('~ label').addClass('up-label');
					else
						$(this).find('~ label').removeClass('up-label');
				});
			});
		});
	</script>
</body>
</html>
