@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/cadastrar.css') }}">
@endsection

@section('titlepage')
Cadastre-se
@endsection

@section('content')
<section id="login">

    <div class="grid-container">
        <div class="box-center">
            <div class="box-header gap text-center">
                <img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
            </div>
            
            <form action="{{ route('login.store') }}" method="POST" id="formLogin" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="cabecalho-cta gap text-center">
                    <p class="h5">Cadastre-se</p>
                </div>
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
                    <input class="input-group-field" type="text" id="txtnome" name="nome" required>
                    <label for="txtnome" class="label-animado"><span class="obrigatorio">*</span>Nome:</label>
                </div>
                
                <div class="input-group gap">
                    <input class="input-group-field" type="text" id="txtsobrenome" name="sobrenome" required>
                    <label for="txtsobrenome" class="label-animado"><span class="obrigatorio">*</span>Sobrenome:</label>
                </div>

                <div class="input-group gap">
                    <input class="input-group-field" type="text" id="txtsobre" name="sobre" required>
                    <label for="txtsobre" class="label-animado"><span class="obrigatorio">*</span>Sobre:</label>
                </div>

                <div class="input-group gap">
                    <input class="input-group-field" type="text" id="txtdatanascimento" name="data_nascimento" required>
                    <label for="txtdatanascimento" class="label-animado"><span class="obrigatorio">*</span>Data de Nascimento:</label>
                </div>

                <div class="input-group gap">
                    <input class="input-group-field" type="text" id="txttelefone" name="telefone" required>
                    <label for="txttelefone" class="label-animado"><span class="obrigatorio">*</span>Telefone:</label>
                </div>
                
                <div class="input-group gap">
                    <input class="input-group-field" type="text" id="txtEmail" name="email" required>
                    <label for="txtEmail" class="label-animado"><span class="obrigatorio">*</span> E-mail:</label>
                </div>
                
                <div class="input-group gap">		
                    <input class="input-group-field" type="password" id="txtSenha" name="senha" required>
                    <label for="txtSenha" class="label-animado"><span class="obrigatorio">*</span> Senha:</label>
                </div>

                <div class="input-group gap">		
                    <input class="input-group-field" type="file" id="foto" name="foto" required>
                    <label for="foto" class="label-animado"><span class="obrigatorio">*</span> Foto:</label>
                </div>

                <div class="input-group gap">		
                    <input class="input-group-field" type="file" id="capa" name="capa" required>
                    <label for="capa" class="label-animado"><span class="obrigatorio">*</span> Capa:</label>
                </div>
                
                <div class="input-group gap">
                    <input class="input-group-field" type="text" id="url_amigavel" name="url_amigavel" required>
                    <label for="url_amigavel" class="label-animado"><span class="obrigatorio">*</span> URL:</label>
                </div>
                
                <div class="box-header gap text-center">
                    <input type="submit" id="btnLogin" class="btn-login btn-principal" value="Cadastrar">
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
    