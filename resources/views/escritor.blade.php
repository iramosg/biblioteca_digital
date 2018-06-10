@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/usuario.css') }}">
@endsection

@section('titlepage')
Escritor
@endsection


@section('content')
	<!-- CONTEUDO -->
	<section id="usuario" class="escritor">

		<div class="grid-container">
			<div class="grid-x">
				<div class="cell small-12 banner gap-big">
					<img src="images/content/banner-escritor.jpg" alt="Leitor">
				</div>
				<div class="cell small-12">

					<section class="content gap-big">
						<p class="txt text-center">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus posuere porta. In dignissim a libero in malesuada. Proin a odio nisi. Aliquam erat volutpat. Suspendisse feugiat, nibh consequat imperdiet sodales, nibh libero ullamcorper enim, at pretium dui lectus sit amet ex. Aliquam erat volutpat. Nullam sapien metus, eleifend sed felis ac, auctor cursus leo. Aenean quis metus consectetur, semper dolor sed, ullamcorper nibh. Proin feugiat luctus mollis. Donec commodo pretium ipsum, sed volutpat massa mattis sed.
						</p>
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
						<p class="txt text-center">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus posuere porta. In dignissim a libero in malesuada. Proin a odio nisi. Aliquam erat volutpat. Suspendisse feugiat, nibh consequat imperdiet sodales, nibh libero ullamcorper enim, at pretium dui lectus sit amet ex. Aliquam erat volutpat. Nullam sapien metus, eleifend sed felis ac, auctor cursus leo. Aenean quis metus consectetur, semper dolor sed, ullamcorper nibh. Proin feugiat luctus mollis. Donec commodo pretium ipsum, sed volutpat massa mattis sed.
						</p>
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