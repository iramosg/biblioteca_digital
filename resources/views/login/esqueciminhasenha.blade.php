@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/login.css') }}">
@endsection

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    
    <div class="account-bg">
        <div class="card-box mb-0">
            <div class="text-center m-t-20">
                <a href="/login" class="logo">
                    <img src="{{asset('assets_admin/img/logo.jpg')}}" alt="">
                </a>
            </div>
            <div class="m-t-10 p-20">
                <div class="row">
                    <div class="col-12 text-center">
                        <h6 class="text-muted text-uppercase mb-0 m-t-0">Recuperar Senha</h6>
                        <p class="text-muted m-b-0 font-13 m-t-20">Digite seu endereço de e-mail e nós lhe enviaremos um e-mail com instruções para redefinir sua senha.</p>
                    </div>
                </div>
                
                <form action="{{ route('login.resetarsenha') }}" class="m-t-30 validation-esquecisenha" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-12">
                            {!! Form::email('email', '', ['placeholder' => 'Insira seu e-mail aqui', 'class' => 'form-control username-field', 'data-rule-required'=>'true', 'data-msg-required'=>'Campo obrigatório']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row text-center m-t-20 mb-0">
                        <div class="col-12">
                            <button class="btn btn-blue-outline btn-block waves-effect waves-light" type="submit">Enviar E-mail</button>
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
    <!-- end card-box-->
    
    <div class="m-t-20">
        <div class="text-center">
            <p class="text-white">Retornar para <a href="{{route('login.index')}}" class="text-white m-l-5"><b>Login</b></p>
            </div>
        </div>
        
    </div>
    <!-- end wrapper page -->

    
    