@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/esqueci-senha.css') }}">
@endsection

@section('titlepage')
Esqueci Minha Senha
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="esqueci-senha">
		<div class="grid-container">
			<div class="box-center">
				<div class="box-header gap text-center">
					<img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
				</div>

				<div class="box-login gap-big">
					<div class="cabecalho-cta gap text-center">
						<p class="h5">Esqueceu sua Senha?</p>
						<p class="h6 subheader">Muita coisa para lembrar, não é mesmo?! Não se preocupe, digite o e-mail cadastrado abaixo para receber um link e escolher uma nova senha</p>
					</div>
					<form action="{{ route('mail.resetarsenha') }}" method="POST" id="formEsqueceuSenha">
							{{ csrf_field() }}
						<div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-user"></i></span>
							<input class="input-group-field" type="text" id="txtEmail" name="email" required>
							<label for="txtEmail" class="label-animado"><span class="obrigatorio">*</span> E-mail:</label>
						</div>

						<div class="input-group grid-x center-full">
							<div class="box-action cell small-12 large-12">
								<input type="submit" id="btnEsqueciSenha" class="btn-esqueci-senha btn-principal" value="Enviar Senha">
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