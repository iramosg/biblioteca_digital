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
                        <div class="capa" style="background-image: url('{{$url}}{{ $seg->usuario["capa"] }}')"></div>
                        <div class="face">
                            <img src="{{$url}}{{ $seg->usuario["foto"] }}" alt="{{ $seg->usuario["nome"] }} {{ $seg->usuario["sobrenome"] }}">
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
                        <div class="capa" style="background-image: url('{{$url}}{{ $seg->amigo["capa"] }}')"></div>
                        <div class="face">
                            <img src="{{$url}}{{ $seg->amigo["foto"] }}" alt="{{ $seg->amigo["nome"] }} {{ $seg->amigo["sobrenome"] }}">
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
                            <img src="{{ asset("$l->capa") }}" alt="{{ $l->titulo }}">
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
                            <a href="{{ route('livros.livro', ['url_amigavel' => $l->url_amigavel ])}}" class="btn-principal">Saiba Mais</a>
                            
                        </div>
                        @if(Auth::id() == $perfil->id)
                        <div class="action">
                            <form action="{{ route('livros.editar') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $l->id }}" name="id">
                                <input type="hidden" value="{{ Auth::id() }}" name="usuario">
                                <button class="btn-edit btn-principal">Editar Livro</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            
            <div class="content publish" id="publicacoes">
                <div class="container">
                    @if(Auth::id())
                    <form action="{{ route('perfil.publicar.save') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="idUsuario" value="{{ Auth::id() }}">
                        <input type="hidden" name="idPerfil" value="{{ $perfil->id }}">
                        <input type="hidden" name="url_amigavel" value="{{ $perfil->url_amigavel }}">
                        <textarea name="content" id="editor">
                            
                        </textarea>
                        <br>
                        <div class="action">
                            <button class="btn-edit btn-principal">PUBLICAR</button>
                        </div>
                        <br>
                    </form>
                    @endif
                </div>
                @if(!empty($publicacao))
                @foreach($publicacao as $p)
                <div class="item">
                    <div class="publicacao">
                        <div class="infos-user">
                            <div class="face">
                                <img src="{{$url}}{{ $p->usuario["foto"] }}" alt="{{ $p->usuario->nome }}">
                            </div>      
                        </div>
                        <div class="infos-post">
                            <div class="date">
                                <p class="txt-date">{{ $p->created }} <form action="{{ route('perfil.publicar.delete') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $p->id }}">
                            <button class="button alert" type="submit">Deletar</button>
                        </form></p>
                                
                            </div>
                            <div class="user-identify gap">
                                <p class="name">{{ $p->usuario->nome }}</p>
                                <p class="city"><span>@</span>{{ $p->usuario->url_amigavel }}</p>
                            </div>
                            <div>
                                <p class="txt">{!! $p->post !!}</p>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                @endforeach
                @endif
            </div>
            
            <div class="content" id="favoritos">
                <div class="grid-produtos">
                    @if(!empty($favoritos))
                    @foreach($favoritos as $l)
                    <div class="item produto">
                        <div class="capa gap">
                            <img src="{{ $url }}{{ $l->livro["capa"] }}" alt="{{ $l->livro->titulo }}">
                        </div>
                        <div class="box-infos gap">
                            <p class="book-name txt">{{ $l->livro->titulo }}</p>
                            <p class="user-name txt">{{ $l->usuario->nome }}</p>
                            <p class="category txt">
                                <span class="txt lt">Publicado em:</span>
                                {{ $l->livro->categoria->categoria }}
                            </p>
                        </div>
                        <div class="action">
                            <a href="{{ route('livros.livro', ['url_amigavel' => $l->livro->url_amigavel ])}}" class="btn-principal">Saiba Mais</a>
                            
                        </div>
                    </div>
                    @endforeach
                    @endif
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
                            <a href="{{ $perfil->instagram }}" class="item instagram">
                                <img src="{{ asset('images/icones/instagram.png') }}" alt="#">
                            </a>
                            <a href="{{ $perfil->facebook }}" class="item facebook">
                                <img src="{{ asset('images/icones/facebook.png') }}" alt="#">
                            </a>
                            <a href="{{ $perfil->youtube }}" class="item youtube">
                                <img src="{{ asset('images/icones/youtube.png') }}" alt="#">
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