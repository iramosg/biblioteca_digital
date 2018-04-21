

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
                        <h6 class="text-muted text-uppercase m-b-0 m-t-0">Faça Login</h6>
                    </div>
                </div>
                
                @if(Session::get("error_login"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="text-center">Dados inválidos, confirme seu login e senha e por favor tente novamente. {{Session::get("errorNumber")}}</p>
                </div>
                {{Session::forget("error_login")}}
                @endif
                
                @if(Session::get("sucess_sendsenha"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="text-center">Sua nova senha foi enviada por e-mail.</p>
                </div>
                {{Session::forget("sucess_sendsenha")}}
                @endif
                
                {!! Form::open(['route' => 'login.entrar', 'method' => 'post', "role" => "form", 'class' => 'm-t-20 form_validation validation-form']) !!}
                
                <div class="form-group row">
                    <div class="col-12">
                        
                        {!! Form::email('email', '', ['placeholder' => 'E-mail', 'class' => 'form-control username-field', 'data-rule-required'=>'true', 'data-msg-required'=>'Campo obrigatório']) !!}
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-12">
                        <input type="password" id="senha" name="senha" value="" placeholder="Senha" class="form-control password-field" data-rule-required="true" data-msg-required="Campo obrigatório"/>
                    </div>
                </div>
                
                <div class="form-group text-center row m-t-10">
                    <div class="col-12">
                        <button class="btn btn-blue-outline btn-block waves-effect waves-light" type="submit">Entrar</button>
                    </div>
                </div>
                
                {!! Form::close() !!}
                
                <div class="form-group row m-t-30 mb-0">
                    <div class="col-12">
                        <a class="text-muted btn-link esqueci-senha" href="{{route('login.esqueciminhasenha')}}">
                            <i class="fa fa-lock m-r-5"></i> Esqueceu sua Senha?
                        </a>
                    </div>
                </div>
                
            </form>
            
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>
<!-- end card-box-->

</div>
<!-- end wrapper page -->