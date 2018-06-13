@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/login.css') }}">
@endsection

@section('titlepage')
Login
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="{{ $classpage }}">
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
					<form action="{{ route('login.entrar') }}" method="POST" id="formLogin">
							{{ csrf_field() }}
						<div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-user"></i></span>
							<input class="input-group-field" type="text" id="txtEmail" name="email" required>
							<label for="txtEmail" class="label-animado"><span class="obrigatorio">*</span> E-mail:</label>
							<p class="help-text danger">Por favor, digite um e-mail válido!</p>
						</div>

						<div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-lock"></i></span>
							<input class="input-group-field" type="password" id="txtSenha" name="senha" required>
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
	
	@endsection
	
	@section('jspage')
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
	@endsection