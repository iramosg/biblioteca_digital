@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/editar-perfil.css') }}">
@endsection

@section('titlepage')
Editar Perfil
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="editar-perfil">
    <div class="grid-container">
        <div class="box-center">
            <div class="box-login">
                <div class="cabecalho-cta gap text-center">
                    <p class="h5">Mudar Senha</p>
                </div>
                <form action="{{ route('perfil.alterarsenha') }}" method="POST" id="alterarSenha">
                    {{ csrf_field() }}
                    
                    <div class="input-group gap">
						<span class="input-group-label"><i class="fas fa-lock"></i></span>
						<input class="input-group-field" type="password" id="txtAtualSenha" name="atualsenha" placeholder="Senha Atual" required>
					</div>
                    <div class="input-group gap">
						<span class="input-group-label"><i class="fas fa-lock"></i></span>
						<input class="input-group-field" type="password" id="txtNovaSenha" name="novasenha" placeholder="Nova Senha" required>
                    </div>
                    
                    <div class="input-group gap">
						<span class="input-group-label"><i class="fas fa-lock"></i></span>
						<input class="input-group-field" type="password" id="txtConfirmaSenha" name="confirmasenha" placeholder="Confirme a Senha" required>
					</div>        
                    <div class="box-action cell small-12 large-6">
                        <input type="submit" id="btnLogin" class="btn-login btn-principal" value="Redefinir">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('jspage')
// Anima Labels
$(document).ready(function(){
    $("form .input-group .input-group-field").each(function(){
        if(this.value != null){
            $(this).find('~ label').addClass('up-label');
        }
        $(this).bind('keydown keyup keypress blur',function(){
            if($(this).val().length > 0)
            $(this).find('~ label').addClass('up-label');
            else
            $(this).find('~ label').removeClass('up-label');
        });
    });
    
    jQuery('#alterarSenha').validate({
        rules : {
            novasenha : {
                minlength : 5
            },
            confirmasenha : {
                minlength : 5,
                equalTo : "#txtNovaSenha"
            },
        }
    });
});
@endsection