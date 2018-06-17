@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/categoria.css') }}">
@endsection

@section('titlepage'){{ $categoria->categoria }}@endsection

@section('content')
<!-- CONTEUDO -->
<section id="{{ $classpage }}">
		<!-- Capa -->
		<div class="banner" style="background-image: url('{{ asset("$categoria->banner") }}');">
			<div class="grid-container">
				<div class="informacoes">
					<p class="h1">{{ $categoria->categoria }}</p>
					
					<div class="search">
						<form action="{{ route('categoria.buscar') }}" method="POST" id="search-form">
							{{ csrf_field() }}
							<input type="hidden" value="{{ $categoria->id }}" name="id">
							<div class="input-group gap">
								<input type="text" name="busca" id="txtSearch" class="inpt-search input-group-field" placeholder="Qual livro você está procurando?">
								<!-- <label for="txtEmail" class="label-animado">Qual livro você está procurando?</label> -->
							</div>
							<input type="submit" class="btn-principal btn-search" value="Buscar">
						</form>
					</div>
					
					<img src="{{ asset("$categoria->icone") }}" alt="Icone Nome da Categoria">
				</div>
			</div>
		</div>
		
		<div class="grid-container">
			
			<!-- Breadcrumbs -->
			<nav aria-label="You are here:" role="navigation">
				<ul class="breadcrumbs">
					<li><a href="#">Homepage</a></li>
					<li><a href="#">Categorias</a></li>
					<li>
						<span class="show-for-sr">Current: </span> {{ $categoria->categoria }}
					</li>
				</ul>
			</nav>
			
			<!-- Os Mais Vendidos -->
			<div class="top-10-products slider-products">
				<div class="box-title">
					<p class="h1">Os Mais Recentes</p>
				</div>
				<div class="grid-produtos">
						@if(!empty($maisRecentes))
						@foreach($maisRecentes as $l)
						<div class="item produto">
							<div class="capa gap">
								<img src="{{ asset("$l->capa") }}" alt="{{ $l->titulo }}">
							</div>
							<div class="box-infos gap">
								<p class="book-name txt">{{ $l->titulo }}</p>
								<p class="user-name txt">{{ $l->autor->nome }} {{ $l->autor->sobrenome }}</p>
								<p class="category txt">
									<span class="txt lt">Publicado em:</span>
									{{ $l->categoria->categoria }}
								</p>
							</div>
							<div class="action">
								<a href="{{ route('livros.livro', ['url_amigavel' => $l->url_amigavel]) }}" class="btn-principal">Saiba Mais</a>
							</div>
							
						</div>
						@endforeach
							@endif
						
					</div>
			</div>
			
			<div class="produtos">
				
				<div class="box-title blue">
					<p class="h1">Descubra Também</p>
				</div>
				<div class="grid-produtos">
					@if(!empty($livros))
					@foreach($livros as $l)
					<div class="item produto">
						<div class="capa gap">
							<img src="{{ asset("$l->capa") }}" alt="{{ $l->titulo }}">
						</div>
						<div class="box-infos gap">
							<p class="book-name txt">{{ $l->titulo }}</p>
							<p class="user-name txt">{{ $l->autor->nome }} {{ $l->autor->sobrenome }}</p>
							<p class="category txt">
								<span class="txt lt">Publicado em:</span>
								{{ $l->categoria->categoria }}
							</p>
						</div>
						<div class="action">
							<a href="{{ route('livros.livro', ['url_amigavel' => $l->url_amigavel]) }}" class="btn-principal">Saiba Mais</a>
						</div>
						
					</div>
					@endforeach
						@endif
					
                </div>
                {{ $livros->links() }}
			</div>
		</div>
	</section>
    @endsection