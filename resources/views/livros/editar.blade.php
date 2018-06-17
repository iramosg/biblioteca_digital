@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/editar-livro.css') }}">
@endsection

@section('titlepage')
Editar Livro
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="{{ $classpage }}">
		<div class="grid-container">
			<div class="box-center">
				<div class="box-login">
					<div class="box-header gap text-center">
						<a href="index.html" title="Homepage">
							<img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
						</a>
					</div>
					<div class="cabecalho-cta gap text-center">
						<p class="h5">Editar Informações do e-book</p>
					</div>
					<form action="{{ route('livros.edit') }}" method="POST" id="formEditarLivro">
						<div class="input-group gap">
							<div class="switch large">
                            <input class="switch-input" id="activated" type="checkbox" name="activated" value="{{ HelperActivated("$livro->activated") }}">
								<label class="switch-paddle" for="activated">
									<span class="switch-active" aria-hidden="true">Ativo</span>
									<span class="switch-inactive" aria-hidden="false">Desativado</span>
								</label>
							</div>
						</div>
						<div class="input-group gap">
							<input class="input-group-field" type="text" id="txtNomeLivro" name="nome" value="{{ $livro->titulo }}" required>
							<label for="txtNomeLivro" class="label-animado">
								<span class="obrigatorio">*</span> Título do Livro:</label>
						</div>
						<div class="input-group gap">
							<input class="input-group-field" type="text" id="txtAnoPublicacao" name="ano" value="{{ $livro->ano }}" required>
							<label for="txtAnoPublicacao" class="label-animado">
								<span class="obrigatorio">*</span> Ano de Publicação:</label>
						</div>
						<div class="input-group gap">
							<input class="input-group-field" type="text" id="txtISBN" name="isbn" value="{{ $livro->isbn }}">
							<label for="txtISBN" class="label-animado">ISBN:</label>
						</div>
						<div class="input-group gap">
							<input class="input-group-field" type="text" id="txtPreco" name="preco" value="{{ $livro->preco }}" required>
							<label for="txtPreco" class="label-animado">
								<span class="obrigatorio">*</span> Preço:</label>
						</div>

						<div class="input-group gap">
							<input class="input-group-field" type="text" id="txtURL" name="url_amigavel" value="{{ $livro->url_amigavel }}" required>
							<label for="txtURL" class="label-animado">
								<span class="obrigatorio">*</span> URL:</label>
						</div>

						<div class="input-group gap">
							<textarea class="input-group-field" type="text" id="txtSinopse" name="sinopse" rows="5">{{ $livro->sinopse }}</textarea>
							<label for="txtSinopse" class="label-animado">Sinopse:</label>
						</div>

						<div class="input-group gap">
							<textarea class="input-group-field" type="text" id="txtDescricao" name="descricao" rows="5">{{ $livro->descricao }}</textarea>
							<label for="txtDescricao" class="label-animado">Descrição:</label>
						</div>

						<div class="input-group gap">
							<input list="categoria" class="input-group-field" type="text" id="optCategoria" name="categoria">
							<label for="optCategoria" class="label-animado">Categoria:</label>
							<datalist id="categoria">
								<option value="Animais">
								<option value="Business">
								<option value="Culinaria">
								<option value="Cursos">
								<option value="Educacionais">
								<option value="Estilo de Vida">
								<option value="Histórias">
								<option value="Idiomas">
								<option value="Mais Vendidos">
								<option value="Outros">
							</datalist>
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
								<input type="submit" id="btnCadastrar" class="btn-alterar btn-principal" value="Confirmar Alterações">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('jspage')

//Activated

$(document).ready(function () {
    var switchPaddle = evento.target.parentNode.querySelector(".switch-paddle");
        console.log(switchPaddle);
    $('.switch-paddle').on('click', function(evento) {
        var input = $('#activated').val();
        var switchPaddle = evento.target.parentNode.querySelector(".switch-paddle");
        console.log(switchPaddle);
        if(input == true) {
            $(".switch-input").val("false");
            switchPaddle.(".switch-active").attr("aria-hidden", false);
            switchPaddle.(".switch-inactive").attr("aria-hidden", true);
        } else {
            $(".switch-input").val("true");
            switchPaddle.(".switch-active").attr("aria-hidden", true);
            switchPaddle.(".switch-inactive").attr("aria-hidden", false);
        }

    });
});

// Anima Labels
		$(document).ready(function () {
			$("form .input-group .input-group-field").each(function () {
				$(this).bind('keydown keyup keypress blur', function () {
					if ($(this).val().length > 0)
						$(this).find('~ label').addClass('up-label');
					else
						$(this).find('~ label').removeClass('up-label');
				});
			});
		});

		// Anima Upload
		$(function () {
			$('.targetChange').on('change', function () {

				// Pega Id do input que mudou
				var id = $(this).attr('id');

				// Pega numero de arquivos para upload
				var totalFiles = $(this).get(0).files.length;


				// Armazena lista ordenada em variavel
				var htm = '<ol>';

				// Verifica qtd total de arquivos para upload e cria uma lista
				for (var i = 0; i < totalFiles; i++) {
					// Remover linha abaixo
					var c = (i % 2 == 0) ? 'item_white' : 'item_grey';

					var arquivo = $(this).get(0).files[i];
					var fileV = new readFileView(arquivo, i);

					// Remover box imagens
					htm += '<li class="' + c + '"><span>' + arquivo.name + '</span></li>' + "\n";
				}

				// Fecha lista ordenada
				htm += '</ol>';

				// Coloca lista ordenada em uma div alvo
				$("#" + id).find('~ .lista').html(htm);
			});
		});

		function readFileView(file, i) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('[data-img="' + i + '"]').attr('src', e.target.result);
			}
			reader.readAsDataURL(file);
		}
@endsection