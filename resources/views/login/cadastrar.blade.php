@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/cadastro.css') }}">
@endsection

@section('titlepage')
Cadastre-se
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="{{ $classpage }}">
		<div class="grid-container">
			<div class="box-center">
				<div class="box-header gap text-center">
					<img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
				</div>
				
				<div class="box-cadastro">
					<div class="cabecalho-cta gap text-center">
						<p class="h5">Seja Bem Vindo à Biblioteka Digital</p>
						<p class="h6 subheader">Preencha os Campos para Realizar seu Cadastro</p>
					</div>
					<form action="{{ route('login.store') }}" method="POST" id="formCadastro">
						{{ csrf_field() }}
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
                        @endif
                        <div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-user"></i></span>
							<input class="input-group-field" type="text" id="txtNome" name="nome" required>
							<label for="txtNome" class="label-animado"><span class="obrigatorio">*</span> Nome:</label>
							<p class="help-text danger">Por favor, digite seu nome!</p>
                        </div>
                        
                        <div class="input-group gap">
							<span class="input-group-label"><i class="fas fa-user"></i></span>
							<input class="input-group-field" type="text" id="txtSobrenome" name="sobrenonme" required>
							<label for="txtSobrenome" class="label-animado"><span class="obrigatorio">*</span> Sobrenome:</label>
							<p class="help-text danger">Por favor, digite seu sobrenome!</p>
                        </div>
                        
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
							<p class="help-text danger">Sua senha deve ter X caracteres</p>
						</div>
						
						<div class="input-group gap-big">
							<span class="input-group-label"><i class="fas fa-lock"></i></span>
							<input class="input-group-field" type="password" id="txtConfirmarSenha" name="confirmar_senha" required>
							<label for="txtConfirmarSenha" class="label-animado"><span class="obrigatorio">*</span> Confirmar Senha:</label>
							<p class="help-text danger">Opa! Parece que as senhas estão diferentes...</p>
						</div>
						<div class="input-group grid-x center-full">
							<div class="box-action cell small-12 large-12">
								<input type="submit" id="btnCadastro" class="btn-cadastro btn-principal" value="Cadastrar">
							</div>
						</div>
					</form>
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
    