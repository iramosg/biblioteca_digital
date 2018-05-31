@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/categoria.css') }}">
@endsection


@section('content')
<!-- CONTEUDO -->
<section id="categoria">
    <!-- Capa -->
    <div class="banner" style="background-image: url({{ asset('images/banner-categorias/banner-animais.jpg')}});">
        <div class="grid-container">
            <div class="informacoes">
                <p class="h1">Livros</p>
            </div>
        </div>
    </div>
    
    <div class="grid-container">
        
        <!-- Breadcrumbs -->
        <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
                <li><a href="#">Homepage</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Livros
                </li>
            </ul>
        </nav>
        
        
        
        <div class="produtos">
            <div class="box-title blue">
                <p class="h1">Livros</p>
            </div>

            <div class="grid-produtos">
                @if(!empty($livros))
                @foreach($livros as $l)
                <div class="item">
                    <div class="capa">
                        <img src="{{ $l->capa }}" alt="{{ $l->titulo }}">
                        {{ $l->titulo }}<br>
                        <span style="font-size:10px">Categoria: {{ $l->categoria->categoria }}</span>
                    </div>
                    <div class="action">
                        <a href="#" class="btn-secundario">Saiba Mais</a>
                    </div>					
                </div>
                @endforeach
                @endif
            </div>

            {{ $livros->links() }}
		</div>
	</section>
    @endsection