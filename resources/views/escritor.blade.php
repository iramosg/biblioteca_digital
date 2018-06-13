@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/usuario.css') }}">
@endsection

@section('titlepage')
Escritor
@endsection


@section('content')
	<!-- CONTEUDO -->
	<section id="usuario" class="{{ $classpage }}">

		<div class="grid-container">
			<div class="grid-x">
				<div class="cell small-12 banner gap-big">
					<img src="images/content/banner-escritor.jpg" alt="Leitor">
				</div>
				<div class="cell small-12">

					<section class="content gap-big">
						<p class="txt text-center">Você contará com soluções para aqueles que querem produzir seu conteúdo   de   forma   independente, que   vão   desde   lições   básicas   para   o desenvolvimento do seu primeiro e-book, como vídeos aulas, dicas de quem já produz, até meios de pagamento e acompanhamento de suas vendas.</p>
						<p class="txt text-center">Também será fornecido ferramentas para auxiliar a divulgação do seu e-book, como ferramentas de afiliados, onde o criador poderá contar com o apoio de diversos usuários em troca de uma pequena parte da venda final.</p>
					</section>

					<section class="produtor apresentacao-user gap">
						<div class="grid-container">

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

					<section class="content gap-big">
						<p class="txt text-center">Para mensurar o seu trabalho, o produtor também terá à sua disposição grupos de discussão, onde os leitores poderão dar feedbacks sobre seu livro, sendo então oferecida uma página onde os usuários possam realizar o download prévio do e-book e assim possam opinar de uma maneira fiel ao conteúdo produzido.</p>
					</section>
				</div>				
			</div>
		</div>

	</section>
@endsection

@section('jspage')
// Inicializando
    	$(document).ready(function(){
    		$('.owl-carousel').owlCarousel({
    			loop: true,
    			margin: 10,
    			responsiveClass: true,
    			responsive: {
    				0: {
    					items: 1,
    					nav: true
    				},
    				600: {
    					items: 3,
    					nav: false
    				},
    				1000: {
    					items: 5,
    					nav: true,
    					loop: false,
    					margin: 20
    				}
    			}
    		})
    	});
@endsection