@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/perfil.css') }}">
@endsection

@section('titlepage')
Perfil de {{ $perfil->nome}}
@endsection


@section('content')

<!-- CONTEUDO -->
<!-- CONTEUDO -->
    <section id="perfil">
        <div class="grid-container">
            <section class="apresentacao-usario gap">
                <div class="capa">
                    <img src="{{ asset("$perfil->capa") }}" alt="{{ $perfil->nome}} {{ $perfil->sobrenome}}">
                    <a href="#" class="btn-edit btn-principal">Editar Perfil</a>
                </div>
                <div class="infos-user">
                    <div class="foto-perfil">
                        <img src="{{ asset("$perfil->foto") }}" alt="{{ $perfil->nome}} {{ $perfil->sobrenome}}">
                    </div>
                    <div class="data">
                        <p class="name">{{ $perfil->nome}} {{ $perfil->sobrenome}}</p>
                        <p class="cidade"><span>@</span>{{ $perfil->url_amigavel }}</p>
                    </div>
                </div>
                <nav class="menu-user">
                    <ul class="menu-action menu-esquerda">
                        <li><a class="link" id="open-seguidores">{{ $totalSeguidores }} Seguidores</a></li>
                        <li><a class="link" id="open-seguindo">{{ $totalSeguindo }} Seguindo</a></li>
                        <li><a class="link ativo" id="open-publicacoes">Publicações</a></li>
                    </ul>

                    <ul class="menu-action menu-direita">
                        <li><a class="link" id="open-biblioteca">Biblioteca</a></li>
                        <li><a class="link" id="open-favoritos">Favoritos</a></li>
                        <li><a class="link" id="open-sobre">Sobre</a></li>
                    </ul>
                </nav>
            </section>

            <section class="conteudo">
                <div class="content" id="seguidores">
                        <div class="user-grid">
                            @if(!empty($seguidores))
                            @foreach($seguidores as $s)
                        <div class="user">
                            <div class="capa" style="background-image: url('{{$s->usuario->capa}}');"></div>
                            <div class="face">
                                <img src="{{$s->usuario->foto}}" alt="">
                            </div>
                            <div class="infos-user">
                                <div class="user-identify gap">
                                    <p class="name">{{ $s->usuario->nome }} {{ $s->usuario->sobrenome }}</p>
                                    <p class="city"><span>@</span>{{ $s->usuario->url_amigavel }}</p>
                                </div>
                                <div class="user-action">
                                    <a class="btn-principal">Visitar Perfil</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="content" id="seguindo">
                    <div class="user-grid">
                            @if(!empty($seguidores))
                            @foreach($seguidores as $s)
                        <div class="user">
                            <div class="capa" style="background-image: url('{{ asset('$s->usuario->capa') }}')"></div>
                            <div class="face">
                                <img src="{{ asset('$s->usuario->foto') }}" alt="">
                            </div>
                            <div class="infos-user">
                                <div class="user-identify gap">
                                    <p class="name">{{ $s->usuario->nome }} {{ $s->usuario->sobrenome }}</p>
                                    <p class="city"><span>@</span>{{ $s->url_amigavel }}</p>
                                </div>
                                <div class="user-action">
                                    <a class="btn-principal">Visitar Perfil</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="content" id="publicacoes">
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
                                    <a href="#" class="btn-principal">Saiba Mais</a>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                <div class="content" id="biblioteca">
                    <div class="grid-produtos">
                        <div class="item">
                            <div class="capa">
                                <img src="images/capas-livros/capa-livro-2.jpg" alt="Nome do Livro 1">
                            </div>
                            <div class="action">
                                <a href="#" class="btn-principal">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content" id="favoritos">
                    <div class="grid-produtos">
                        <div class="item">
                            <div class="capa">
                                <img src="images/capas-livros/capa-livro-3.jpg" alt="Nome do Livro 1">
                            </div>
                            <div class="action">
                                <a href="#" class="btn-principal">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content about" id="sobre">
                    <div class="center-full">
                        <div class="box-infos box-apresentacao">
                            <p class="title">
                                Informações Pessoais
                            </p>

                            <div class="item-info box-aniversario">
                                <p class="title">Aniversário</p>
                                <p class="txt">{{ $perfil->data_nascimento }}</p>
                            </div>

                            <div class="item-info box-sobre">
                                <p class="title">Sobre:</p>
                                <p class="txt">{{ $perfil->sobre }}</p>
                            </div>
                        </div>

                        <div class="box-infos box-contato">
                            <p class="title">
                                Contato
                            </p>

                            <div class="item-info email">
                                <p class="title">E-mail</p>
                                <p class="txt">{{ $perfil->email }}</p>
                            </div>

                            <div class="item-info telefone">
                                <p class="title">Telefone</p>
                                <p class="txt">{{ $perfil->telefone }}</p>
                            </div>

                            <div class="item-info sociais">
                                <a href="#" class="item instagram">
                                    <img src="{{ asset('images/icones/instagram.png') }}" alt="#">
                                    <span class="user">@UserManeiro</span>
                                </a>
                                <a href="#" class="item facebook">
                                    <img src="{{ asset('images/icones/facebook.png') }}" alt="#">
                                    <span class="user">@UserManeiro</span>
                                </a>
                                <a href="#" class="item youtube">
                                    <img src="{{ asset('images/icones/youtube.png') }}" alt="#">
                                    <span class="user">@UserManeiro</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
@endsection

@section('jspage')
jQuery(document).ready(function(){
    jQuery(".menu-action li a").click(function(){
        jQuery(this).closest(".menu-user").find(".ativo").removeClass("ativo");
        jQuery(this).addClass("ativo");
        var id = jQuery(this).attr("id").replace('open-', '');
        jQuery("#perfil .conteudo .content").fadeOut(500);
        jQuery("#perfil .conteudo #" + id).fadeIn();
    });
});
@endsection