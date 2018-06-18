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
            
            <!-- <div class="box-header gap text-center">
                <a href="index.html" title="Homepage">
                    <img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
                </a>
            </div> -->
            
            <div class="box-login">
                
                <div class="input-group gap">
                <a href="{{ route('perfil.mudarsenha') }}" id="btnConfirmar" class="btn-confirmar btn-principal alert">Alterar Senha </a>
                    
                </div>
                
                
                <form action="{{ route('perfil.edit') }}" method="POST" id="editarPerfil" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group gap">
                        <div id="multiple_upload">
                            <input type="file" id="uploadChange1" class="targetChange" name="foto"/>
                            
                            <div class="message">Foto do Perfil (.jpg)</div>
                            
                            <input type="button" class="btn btn-secundario" value="Upload" />
                            
                            <div class="lista"></div>
                        </div>
                    </div>
                    <div class="input-group gap">
                        <div id="multiple_upload">
                            <input type="file" id="uploadChange2" class="targetChange" name="capa"/>
                            
                            <div class="message">Capa do Perfil (.jpg)</div>
                            
                            <input type="button" class="btn btn-secundario" value="Upload" />
                            
                            <div class="lista"></div>
                        </div>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtNome" name="nome" value="{{ $perfil->nome }}">
                        <label for="txtNome" class="label-animado">Nome:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtSobrenome" name="sobrenome" value="{{ $perfil->sobrenome }}">
                        <label for="txtSobrenome" class="label-animado">Sobrenome:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtUrl" name="url_amigavel" value="{{ $perfil->url_amigavel }}">
                        <label for="txtUrl" class="label-animado">URL Amigável:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtDataNascimento" name="data_nascimento" value="{{ $perfil->data_nascimento }}" data-mask="00/00/0000">
                        <label for="txtDataNascimento" class="label-animado">Data de Nascimento:</label>
                    </div>
                    <div class="input-group gap">
                        <textarea class="input-group-field" id="txtSobre" name="sobre" scroll="no">{{ $perfil->sobre }}</textarea>
                        <label for="txtSobre" class="label-animado">Sobre:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtTelefone" name="telefone" value="{{ $perfil->telefone }}" data-mask="(00) 0000-00009">
                        <label for="txtTelefone" class="label-animado">Telefone:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtEmail" name="email"  value="{{ $perfil->email }}">
                        <label for="txtEmail" class="label-animado">E-mail:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="urlFacebook" name="facebook" value="{{ $perfil->facebook }}">
                        <label for="urlFacebook" class="label-animado">Facebook:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="urlInstagram" name="instagram" value="{{ $perfil->instagram }}">
                        <label for="urlInstagram" class="label-animado">Instagram:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="urlYouTube" name="youtube" value="{{ $perfil->youtube }}">
                        <label for="urlYouTube" class="label-animado">YouTube:</label>
                    </div>
                    
                    <div class="input-group grid-x center-full">
                        <div class="box-action cell small-12 large-12">
                            <input type="submit" id="btnConfirmar" class="btn-confirmar btn-principal" value="Confirmar Informações">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
        
        jQuery('#formCadastro').validate({
            rules : {
				email : {
					email : true
				}
            }
        });
    });
    
    // Anima Upload
    $(function(){
        $('.targetChange').on('change',function() {
            
            // Pega Id do input que mudou
            var id = $(this).attr('id');
            
            // Pega numero de arquivos para upload
            var totalFiles = $(this).get(0).files.length;
            
            
            // Armazena lista ordenada em variavel
            var htm='<ol>';
                
                // Verifica qtd total de arquivos para upload e cria uma lista
                for (var i=0; i < totalFiles; i++) {
                    // Remover linha abaixo
                    var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                    
                    var arquivo = $(this).get(0).files[i];
                    var fileV = new readFileView(arquivo, i);
                    
                    // Remover box imagens
                    htm += '<li class="'+c+'"><span>'+arquivo.name+'</span></li>'+"\n";
                }
                
                // Fecha lista ordenada
                htm += '</ol>';
                
                // Coloca lista ordenada em uma div alvo
                $("#"+id).find('~ .lista').html(htm);  
            });
		});
        
		function readFileView(file, i) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('[data-img="'+i+'"]').attr('src', e.target.result);
			}
            reader.readAsDataURL(file);
		}
        @endsection