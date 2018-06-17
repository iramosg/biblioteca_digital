@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/perfil.css') }}">

<style>
        .ck-editor__editable {
            min-height: 150px;
        }
        </style>
@endsection

@section('titlepage')
Perfil de {{ $perfil->nome }}
@endsection

@section('content')
<!-- CONTEUDO -->
    <section id="{{ $classpage }}">
        <div class="grid-container">
            <section class="apresentacao-usario gap">
                <div class="capa">
                    <img src="{{ asset("$perfil->capa") }}" alt="{{ $perfil->nome}} {{ $perfil->sobrenome }}">

                    @if(Auth::id())
                    @if(!empty($botao))

                    @if($botao == 'editar')
                    <!-- Para editar o perfil -->
                    <a href="{{ route('perfil.editar') }}" class="btn-action btn-edit btn-principal">Editar Perfil</a>
                    @endif

                    @if($botao == 'seguir')
                    <form action="{{ route('perfil.amigo.adicionar') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $perfil->id }}" name="id">
                        <input type="hidden" value="{{ Auth::id() }}" name="usuario">
                        <input type="submit" class="btn-action btn-follow btn-principal" value="Seguir Usuário">
                    </form>
                    @endif

                @if($botao == 'deixar_seguir')
                <form action="{{ route('perfil.amigo.remover') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $perfil->id }}" name="id">
                    <button class="btn-action btn-unfollow btn-principal btn-red">Deixar de Seguir</button>
                </form>
                @endif

                @endif

                @endif

                </div>
                <div class="infos-user">
                    <div class="foto-perfil">
                        <img src="{{ asset("$perfil->foto") }}" alt="{{ $perfil->nome}} {{ $perfil->sobrenome }}">
                    </div>
                    <div class="data">
                        <p class="name">{{ $perfil->nome }} {{ $perfil->sobrenome }}</p>
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
                {{-- <div class="content" id="seguidores">
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
                                    <a class="btn-principal" href="{{ route('perfil.index', ['url_amigavel' => $s->usuario->url_amigavel]) }}">Visitar Perfil</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div> --}}

                <div class="content" id="seguidores">
                        <div class="user-grid">
                            
                                @if(!empty($seguidores))
                                @foreach($seguidores as $seg)
                                
                            <div class="user">
                                <div class="capa" style="background-image: url('{{ asset('$seg->usuario->capa') }} ')"></div>
                                <div class="face">
                                    <img src="{{ asset('$seg->usuario->foto') }}" alt="">
                                </div>
                                <div class="infos-user">
                                    <div class="user-identify gap">
                                        <p class="name">{{ $seg->usuario["nome"] }} {{ $seg->usuario["sobrenome"] }}</p>
                                        <p class="city"><span>@</span>{{ $seg->usuario["url_amigavel"] }}</p>
                                    </div>
                                    <div class="user-action">
                                    <a class="btn-principal" href="{{ route('perfil.index', ['url_amigavel' => $seg->usuario["url_amigavel"]]) }}">Visitar Perfil</a>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                            @endif
                        </div>
                    </div>
                

                <div class="content" id="seguindo">
                    <div class="user-grid">
                        
                            @if(!empty($seguindo))
                            @foreach($seguindo as $seg)
                            
                        <div class="user">
                            <div class="capa" style="background-image: url('{{ asset('$seg->amigo->capa') }} ')"></div>
                            <div class="face">
                                <img src="{{ asset('$seg->amigo->foto') }}" alt="">
                            </div>
                            <div class="infos-user">
                                <div class="user-identify gap">
                                    <p class="name">{{ $seg->amigo["nome"] }} {{ $seg->amigo["sobrenome"] }}</p>
                                    <p class="city"><span>@</span>{{ $seg->amigo["url_amigavel"] }}</p>
                                </div>
                                <div class="user-action">
                                <a class="btn-principal" href="{{ route('perfil.index', ['url_amigavel' => $seg->amigo["url_amigavel"]]) }}">Visitar Perfil</a>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="content" id="biblioteca">
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

                    <div class="content publish" id="publicacoes">
                        <div class="container">
                            <textarea name="content" id="editor">
                                <p>Deixe sua publicação aqui.</p>
                            </textarea>
                            <br>
                        </div>

                        <div class="item">
                            <div class="infos-user">
                                <div class="face">
                                    <img src="https://images-na.ssl-images-amazon.com/images/I/61usVwOgqYL._SY355_.jpg" alt="">
                                </div>      
                            </div>
                            <div class="infos-post">
                                <div class="date">
                                    <p class="txt-date">22 de Jan de 2018</p>
                                </div>
                                <div class="user-identify gap">
                                    <p class="name">Igor</p>
                                    <p class="city">Fim do Mundo, SP</p>
                                </div>
                                <p class="txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis quia maxime consequatur, iste veniam culpa sed sequi reiciendis inventore dolores! Esse culpa magni quae eaque molestiae doloribus, qui necessitatibus voluptate.</p>
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
                                    <span class="user">{{ $perfil->instagram }}</span>
                                </a>
                                <a href="#" class="item facebook">
                                    <img src="{{ asset('images/icones/facebook.png') }}" alt="#">
                                    <span class="user">{{ $perfil->facebook }}</span>
                                </a>
                                <a href="#" class="item youtube">
                                    <img src="{{ asset('images/icones/youtube.png') }}" alt="#">
                                    <span class="user">{{ $perfil->youtube }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>

    <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
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