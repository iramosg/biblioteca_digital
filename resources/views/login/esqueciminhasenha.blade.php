@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/esqueciminhasenha.css') }}">
@endsection

@section('titlepage')
Esqueci Minha Senha
@endsection

@section('content')
<section id="login">
    <div class="grid-container">
        <div class="box-center">
            <div class="box-header gap text-center">
                <img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
            </div>
            
            <form action="{{ route('mail.resetarsenha') }}" method="POST" id="formLogin">
                {{ csrf_field() }}
                <div class="cabecalho-cta gap text-center">
                    <p class="h6 subheader">Para redefinir sua senha, informe abaixo seu email de login:</p>
                </div>
                <div class="input-group gap">
                    <span class="input-group-label"><i class="fas fa-user"></i></span>
                    <input class="input-group-field" type="text" id="email" name="email" required>
                    <label for="txtEmail" class="label-animado"><span class="obrigatorio">*</span> E-mail:</label>
                </div>
                <div class="box-action cell small-12 large-6">
                    <input type="submit" id="btnLogin" class="btn-login btn-principal" value="Redefinir">
                </div>
            </div>
        </div>
    </form>
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