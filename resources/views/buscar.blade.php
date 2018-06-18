@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/resultado-busca.css') }}">
@endsection

@section('titlepage')
Você buscou por: {{ $like }}
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="resultado-busca">
    
    <!-- Capa -->
    <div class="banner" style="background-image: url({{ asset('images/content/banner-busca.jpg')}});">
        <div class="grid-container">
            <div class="informacoes">
                <p class="h1">Resultado da Busca</p>
            </div>
        </div>
    </div>
    
    <div class="grid-container">
        
        <!-- Breadcrumbs -->
        <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
                <li><a href="#">Homepage</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Resultado da Busca
                </li>
            </ul>
        </nav>
        
        <div class="resultados">
            
            <div class="box-title blue">
                <p class="h1">Busca: {{ $like }}</p>
            </div>
            
            <!-- Quando resultado é Categoria -->
            @if($tipo == 'categoria')
            <div class="grid-category">
                @foreach($objeto as $c)
                <div class="item categoria">
                    <a href="{{ route('categoria.index', ['url_amigavel' => $c->url_amigavel]) }}" class="link-categ">
                        <img src="{{ asset("$c->icone") }}" alt="Business">
                        <p class="title-categ">{{ $c->categoria }}</p>
                    </a>                        
                </div>
                @endforeach
            </div>
            @endif
            
            <!-- Quando Resultado é Produto -->
            @if($tipo == 'livro')
            <div class="grid-produtos">
                @foreach($objeto as $l)
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
            </div>  
            @endif
            
            <!-- Quando Resutaldo é User -->
            @if($tipo == 'usuario')
            <div class="user-grid">
                @foreach($objeto as $u)
                <div class="user">
                    <div class="capa" style="background-image: url('{{$url}}{{ $u->capa }}')"></div>
                    <div class="face">
                        <img src="{{$url}}{{ $u->foto }}" alt="{{ $u->nome }} {{ $u->sobrenome }}">
                    </div>
                    <div class="infos-user">
                        <div class="user-identify gap">
                            <p class="name">{{ $u->nome }} {{ $u->sobrenome }}</p>
                            <p class="city"><span>@</span>{{ $u->url_amigavel }}</p>
                        </div>
                        <div class="user-action">
                            <a class="btn-principal" href="{{ route('perfil.index', ['url_amigavel' => $u->url_amigavel]) }}">Visitar Perfil</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </section>
        @endsection