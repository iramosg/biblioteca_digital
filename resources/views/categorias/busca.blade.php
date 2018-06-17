@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/resultado-busca.css') }}">
@endsection

@section('titlepage')
Você buscou por: {{ $like }}
@endsection

@section('content')
<!-- CONTEUDO -->
<section id="{{ $classpage }}">

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

                <!-- Quando Resultado é Produto -->
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
    </section>
    @endsection