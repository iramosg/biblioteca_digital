@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/cadastro-livro.css') }}">
@endsection

@section('titlepage')
Cadastrar Livro
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="cadastro-livro">
    <div class="grid-container">
        <div class="box-center">
            <div class="box-login gap-big">
                <div class="cabecalho-cta gap text-center">
                    <p class="h5">Cadastro de Novo Livro</p>
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
                
                <form action="{{ route('livros.save') }}" method="POST" id="formNewLivro" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group gap">
                    <input class="input-group-field" type="text" id="txtNomeLivro" name="titulo" value="{{ old("titulo") }}" required>
                        <label for="txtNomeLivro" class="label-animado"><span class="obrigatorio">*</span> Título do Livro:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtAnoPublicacao" data-mask="0000" name="ano" value="{{ old("ano") }}" required>
                        <label for="txtAnoPublicacao" class="label-animado"><span class="obrigatorio">*</span> Ano de Publicação:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtISBN" name="isbn" data-mask="00000000000" value="{{ old("isbn") }}">
                        <label for="txtISBN" class="label-animado">ISBN:</label>
                    </div>
                    <div class="input-group gap">
                        <input class="input-group-field" type="text" id="txtPreco" name="preco" data-mask="##.00" value="{{ old("preco") }}" required>
                        <label for="txtPreco" class="label-animado"><span class="obrigatorio">*</span> Preço:</label>
                    </div>
                    
                    <div class="input-group gap">
                        <textarea class="input-group-field required"  type="text" id="txtResumo" name="sinopse" rows="5">{{ old("sinopse") }}</textarea>
                        <label for="txtResumo" class="label-animado">Sinopse:</label>
                    </div>
                    
                    <div class="input-group gap">
                        <textarea class="input-group-field required"  type="text" id="txtDescricao" name="descricao" rows="5">{{ old("descricao") }}</textarea>
                        <label for="txtDescricao" class="label-animado">Descrição:</label>
                    </div>

                    <div class="input-group gap">
                            <input class="input-group-field" type="text" id="txtURL" name="url_amigavel" value="{{ old("url_amigavel") }}" required>
                            <label for="txtURL" class="label-animado"><span class="obrigatorio">*</span> URL:</label>
                        </div>
                    
                    <div class="input-group gap">
                        <select id="categoria" name="categoria">
                            @if(!empty($categorias))
                            @foreach($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->categoria }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <div class="input-group gap">
                        <div id="multiple_upload">
                            <input type="file" id="uploadChange1" class="targetChange" name="capa" />
                            
                            <div class="message">Capa do Ebook (.jpg, .png)</div>
                            
                            <input type="button" class="btn btn-secundario" value="Upload" />
                            
                            <div class="lista"></div>
                        </div>
                    </div>
                    
                    <div class="input-group gap">
                        <div id="multiple_upload">
                            <input type="file" id="uploadChange2" class="targetChange" name="download_previo" />
                            
                            <div class="message">PDF do Preview Ebook</div>
                            
                            <input type="button" class="btn btn-secundario" value="Upload" />
                            
                            <div class="lista"></div>
                        </div>
                    </div>
                    
                    <div class="input-group gap">
                        <div id="multiple_upload">
                            <input type="file" id="uploadChange3" class="targetChange" name="download" />
                            
                            <div class="message">PDF do Ebook</div>
                            
                            <input type="button" class="btn btn-secundario" value="Upload" />
                            
                            <div class="lista"></div>
                        </div>
                    </div>
                    
                    <div class="input-group grid-x center-full">
                        <div class="box-action cell small-12 large-12">
                            <input type="submit" id="btnCadastrar" class="btn-cadastro btn-principal" value="Cadastrar Livro">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('jspage')
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

    jQuery('#formNewLivro').validate();
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