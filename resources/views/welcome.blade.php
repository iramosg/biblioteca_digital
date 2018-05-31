@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/homepage.css') }}">
@endsection


@section('content')
<!-- CONTEUDO -->
<section id="homepage">
	
	<!-- Apresentacao -->
	<section class="bg-full gap">
		<div class="grid-container">
			<div class="box-categorias">
				@if(!empty($categorias))
				@foreach($categorias as $c)
				<div class="item animais">
				<a href="{{ route('categoria.index', ['url_amigavel' => $c->url_amigavel]) }}" class="link-categ">
						<img src="{{ $c->icone }}" alt="Animais">
						<p class="title-categ">{{ $c->categoria }}</p>
					</a>
				</div>
				{{-- <div class="item business">
					<a href="#" class="link-categ">
						<img src="images/icones/business.png" alt="Business">
						<p class="title-categ">Business</p>
					</a>
				</div>
				<div class="item culinaria">
					<a href="#" class="link-categ">
						<img src="images/icones/culinaria.png" alt="Culinária">
						<p class="title-categ">Culinária</p>
					</a>
				</div>
				<div class="item cursos">
					<a href="#" class="link-categ">
						<img src="images/icones/cursos.png" alt="Cursos">
						<p class="title-categ">Cursos</p>
					</a>
				</div>
				<div class="item educacionais">
					<a href="#" class="link-categ">
						<img src="images/icones/educacionais.png" alt="Educacionais">
						<p class="title-categ">Educacionais</p>
					</a>
				</div>
				<div class="item estilo-vida">
					<a href="#" class="link-categ">
						<img src="images/icones/estilo-vida.png" alt="Estilo de Vida">
						<p class="title-categ">Estilo de Vida</p>
					</a>
				</div>
				<div class="item historia">
					<a href="#" class="link-categ">
						<img src="images/icones/historias.png" alt="Histórias">
						<p class="title-categ">Histórias</p>
					</a>
				</div>
				<div class="item idiomas">
					<a href="#" class="link-categ">
						<img src="images/icones/linguas.png" alt="Idiomas">
						<p class="title-categ">Idiomas</p>
					</a>
				</div>
				<div class="item mais-vendidos">
					<a href="#" class="link-categ">
						<img src="images/icones/mais-vendidos.png" alt="Mais Vendidos">
						<p class="title-categ">Mais Vendidos</p>
					</a>
				</div>
				<div class="item outros">
					<a href="#" class="link-categ">
						<img src="images/icones/outros.png" alt="Outros">
						<p class="title-categ">Outros</p>
					</a>
				</div> --}}
				@endforeach
				@endif
			</div>
			
			<div class="box-cta">
				<a href="#" class="btn-cta">Conheça a Plataforma</a>
			</div>
		</div>
	</section>
	
	<section class="produtor apresentacao-user gap">
		<div class="grid-container">
			<div class="cabecalho-apresentacao gap">
				<p class="h2">Seja um Produtor</p>
				<p class="txt">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi excepturi totam dignissimos dolore quia quod ut, nisi odio saepe, fugit culpa sed. Aspernatur, tempora magni. Quas sed, neque ut quisquam!
				</p>
			</div>
			
			<div class="apresentacao gap">
				<div class="item">
					<div class="icon">
						<img src="images/icones/icon-megafone.png" alt="">
					</div>
					<div class="conteudo">
						<p class="h4">
							Aumente sua Visibilidade
						</p>
						<p class="txt">
							Deixe que o mundo conheça seu potencial e compartilhe seus produtos
						</p>
					</div>
				</div>
				
				<div class="item">
					<div class="icon">
						<img src="images/icones/icon-money.png" alt="">
					</div>
					<div class="conteudo">
						<p class="h4">
							Publique seus e-books e Ganhe Dinheiro
						</p>
						<p class="txt">
							Conquiste aquela renda tão sonhada com seus produtos
						</p>
					</div>
				</div>
				
				<div class="item">
					<div class="icon">
						<img src="images/icones/icon-connection.png" alt="">
					</div>
					<div class="conteudo">
						<p class="h4">
							Encontre Parceiros em Nossa Cominudade
						</p>
						<p class="txt">
							Conte com a ajuda de Afiliados para impulsionar as vendas de seus e-books
						</p>
					</div>
				</div>
			</div>
			
			<div class="action">
				<a href="#" class="button btn-secundario">Quero ser um produtor!</a>
			</div>
		</div>
	</section>
	
	<section class="video-apresentacao gap">
		<div class="box-video">
			<iframe width="100%" height="auto" src="https://www.youtube.com/embed/X4H9u9VXV-Y?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
	</section>
	
	<section class="produtor apresentacao-user gap">
		<div class="grid-container">
			<div class="cabecalho-apresentacao gap">
				<p class="h2">Seja um Leitor</p>
				<p class="txt">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi excepturi totam dignissimos dolore quia quod ut, nisi odio saepe, fugit culpa sed. Aspernatur, tempora magni. Quas sed, neque ut quisquam!
				</p>
			</div>
			
			<div class="apresentacao gap">
				<div class="item">
					<div class="icon">
						<img src="images/icones/icon-heart.png" alt="">
					</div>
					<div class="conteudo">
						<p class="h4">
							Favorite os Ebooks que mais Gostar
						</p>
						<p class="txt">
							Deixe que todos saibam que aquele produto é incrível!
						</p>
					</div>
				</div>
				
				<div class="item">
					<div class="icon">
						<img src="images/icones/icon-cloud.png" alt="">
					</div>
					<div class="conteudo">
						<p class="h4">
							Conheça o Ebook com Download Prévio
						</p>
						<p class="txt">
							Fique a vontade para conhecer o ebook antes de comprá-lo
						</p>
					</div>
				</div>
				
				<div class="item">
					<div class="icon">
						<img src="images/icones/icon-group.png" alt="">
					</div>
					<div class="conteudo">
						<p class="h4">
							Fique por Dentro de seus ebooks Favoritos
						</p>
						<p class="txt">
							Participe de grupos e compartilhe com todos o que masi gostou em um produto
						</p>
					</div>
				</div>
			</div>
			
			<div class="action">
				<a href="#" class="button btn-secundario">Quero ser um produtor!</a>
			</div>
		</div>
	</section>
	
	<section class="planos">
		<div class="grid-container">
			<div class="cabecalho-apresentacao gap">
				<p class="h2">Venha Fazer Parte do Nosso Clube</p>
				<p class="txt">
					Para criar uma conta na Biblioteka Digital não é preciso pagar nada! Temos um plano exclusivo para que você possa aproveitar toda a plataforma, porém você pode optar por um de nosso planos pagos e desta forma, ganhará benefícios exclusivos!
				</p>
			</div>
			
			<div class="tipos-planos">
				<div class="item plano-mensal">
					<h3>Boas Vindas</h3>
					<p class="txt-acesso">(Acesso Gratuído)</p>
					<div class="box-preco">
						<span class="txt-moeda">R$</span>
						<span class="preco">00<span class="preco-lt">,00</span></span>
						<span class="txt-recorrencia">/mês</span>
						<span class="txt-preco-cheio"></span>
					</div>
					<div class="vantagens">
						<p class="item-vantagem">
							Publique seus ebooks gratuitamente
						</p>
						<p class="item-vantagem">
							Faça download prévio dos ebooks publicados
						</p>
						<p class="item-vantagem">
							Participe de grupos e fique por dentro de tudo
						</p>
						<p class="item-vantagem">
							Siga usuários e conheça o que eles estão lendo
						</p>
						<p class="item-vantagem desativado">
							Faça vínculos com afiliados e impulsione as vendas
						</p>
						<p class="item-vantagem desativado">
							Conheça as estatísticas do seus produtos
						</p>
						<p class="item-vantagem desativado">
							Crie streamings e ganhe novos fãs
						</p>
						<p class="item-vantagem desativado">
							Faça suas campanhas e aumente suas vendas
						</p>
						<p class="item-vantagem desativado">
							Receba Consultoria de Nossa Equipe
						</p>
					</div>
					<div class="box-pgmt">
						<a href="https://pay.hotmart.com/H6104554C?off=zy4kjhaf&amp;sck=" title="Assine Já!" class="button btn-principal">Comece Agora</a>
						<p class="formas-pagamento">
							<span>Formas de Pagamento</span>
							<img src="https://www.universidadeecommerce.com/media/wysiwyg/icones/icon-card.png" alt="Icone Cartao">
							<img src="https://www.universidadeecommerce.com/media/wysiwyg/icones/icon-boleto.png" alt="Icone Boleto">
						</p>
					</div>
				</div>
				<div class="item plano-semestral">
					<h3>Aventureiro</h3>
					<p class="txt-acesso">(para Novos Produtores)</p>
					<div class="box-preco">
						<span class="txt-moeda">R$</span>
						<span class="preco">59<span class="preco-lt">,00</span></span>
						<span class="txt-recorrencia">/mês</span>
						<span class="txt-preco-cheio">( R$ 600,00 a vista )</span>
					</div>
					<div class="vantagens">
						<p class="item-vantagem">
							Publique seus ebooks gratuitamente
						</p>
						<p class="item-vantagem">
							Faça download prévio dos ebooks publicados
						</p>
						<p class="item-vantagem">
							Participe de grupos e fique por dentro de tudo
						</p>
						<p class="item-vantagem">
							Siga usuários e conheça o que eles estão lendo
						</p>
						<p class="item-vantagem">
							Faça vínculos com afiliados e impulsione as vendas
						</p>
						<p class="item-vantagem">
							Conheça as estatísticas do seus produtos
						</p>
						<p class="item-vantagem desativado">
							Crie streamings e ganhe novos fãs
						</p>
						<p class="item-vantagem desativado">
							Faça suas campanhas e aumente suas vendas
						</p>
						<p class="item-vantagem desativado">
							Receba Consultoria de Nossa Equipe
						</p>
					</div>
					<div class="box-pgmt">
						<a href="https://pay.hotmart.com/H6104554C?off=1sbq7owd&amp;sck=" title="Assine Já!" class="button btn-principal">Comece Agora</a>
						<p class="formas-pagamento">
							<span>Formas de Pagamento</span>
							<img src="https://www.universidadeecommerce.com/media/wysiwyg/icones/icon-card.png" alt="Icone Cartao">
							<img src="https://www.universidadeecommerce.com/media/wysiwyg/icones/icon-boleto.png" alt="Icone Boleto">
						</p>
					</div>
				</div>
				<div class="item plano-anual">
					<h3>Produtor Master</h3>
					<p class="txt-acesso">(para Produtores de Sucesso)</p>
					<div class="box-preco">
						<span class="txt-moeda">R$</span>
						<span class="preco">79<span class="preco-lt">,00</span></span>
						<span class="txt-recorrencia">/mês</span>
						<span class="txt-preco-cheio">( R$ 800,00 a vista )</span>
					</div>
					<div class="vantagens">
						<p class="item-vantagem">
							Publique seus ebooks gratuitamente
						</p>
						<p class="item-vantagem">
							Faça download prévio dos ebooks publicados
						</p>
						<p class="item-vantagem">
							Participe de grupos e fique por dentro de tudo
						</p>
						<p class="item-vantagem">
							Siga usuários e conheça o que eles estão lendo
						</p>
						<p class="item-vantagem">
							Faça vínculos com afiliados e impulsione as vendas
						</p>
						<p class="item-vantagem">
							Conheça as estatísticas do seus produtos
						</p>
						<p class="item-vantagem">
							Crie streamings e ganhe novos fãs
						</p>
						<p class="item-vantagem">
							Faça suas campanhas e aumente suas vendas
						</p>
						<p class="item-vantagem">
							Receba Consultoria de Nossa Equipe
						</p>
					</div>
					<div class="box-pgmt">
						<a href="https://pay.hotmart.com/H6104554C?off=eez3hhu0&amp;sck=" title="Assine Já!" class="button btn-principal">Comece Agora</a>
						<p class="formas-pagamento">
							<span>Formas de Pagamento</span>
							<img src="https://www.universidadeecommerce.com/media/wysiwyg/icones/icon-card.png" alt="Icone Cartao">
							<img src="https://www.universidadeecommerce.com/media/wysiwyg/icones/icon-boleto.png" alt="Icone Boleto">
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>

@endsection