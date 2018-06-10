@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/categoria.css') }}">
@endsection

@section('titlepage')
Livros
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
        
        <form action="{{ route('livros.buscar') }}" method="POST">
            {{ csrf_field() }}
            <input type="text" name="busca" placeholder="Buscar">
            <button>Enviar</button>
        </form>
        
        <div class="produtos">
            <div class="box-title blue">
                <p class="h1">Livros</p>
            </div>
            
            <div class="grid-produtos">

                
                    <div class="grid-produtos">
                            @if(!empty($livros))
                            @foreach($livros as $l)
                        <div class="item produto">
                            <div class="capa gap">
                                <img src="{{ $l->capa }}" alt="{{ $l->titulo }}">
                            </div>
                            <div class="box-infos gap">
                                <p class="book-name txt">{{ $l->titulo }}</p>
                                <p class="user-name txt">{{ $l->autor->nome }}</p>
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
	</section>
    @endsection