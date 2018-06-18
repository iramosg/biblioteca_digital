@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/pagina-livro.css') }}">
@endsection

@section('titlepage')
{{ $livro->titulo }}
@endsection

@section('content')
 <!-- CONTEUDO -->
 <section id="{{ $classpage }}">
        <div class="grid-container">
            <div class="box-geral gap">
                <div class="capa">
                    <img src="{{ asset("$livro->capa") }}" alt="{{ $livro->titulo }}">
                </div>
                <div class="infos">
                    <h2 class="nome h2">{{ $livro->titulo }}</h2>
                    <h3 class="autor gap h6">{{ $livro->autor->nome }} {{ $livro->autor->sobrenome }}</h3>
                    <p>{{ $livro->categoria->categoria }}</p>
                        <p>{{ $livro->isbn }}</p>
                    <div class="">
                        <h3>Ranking</h3>
                        <h2>{{$avgrank}}</h2>
                    @if(Auth::id())
                        @if(is_null($cRank))
                            <form action="{{ route('livros.ranking', ['url_amigavel' => $livro->url_amigavel]) }}" method="post">
                                    {{ csrf_field() }}
                                <input type="radio" name="rank" value="r1">1* 
                                <span class="ranking"></span>
                                <input type="radio" name="rank" value="r2">2* 
                                <span class="ranking"></span>                            
                                <input type="radio" name="rank" value="r3">3* 
                                <span class="ranking"></span>
                                <input type="radio" name="rank" value="r4">4* 
                                <span class="ranking"></span>
                                <input type="radio" name="rank" value="r5">5* 
                                <span class="ranking"></span>
                                <input type="submit" value="Envie sua Avaliação">
                                <span class="ranking"></span>
                            </form>
                        @else
                            <form action="{{ route('livros.reranking', ['url_amigavel' => $livro->url_amigavel]) }}" method="post">
                                {{ csrf_field() }}
                                {{-- {{$rank}} --}}
                                @if($nRank->ranking == 1)
                                    <input type="radio" name="rank" value="r1" checked>1*
                                    <input type="radio" name="rank" value="r2">2*
                                    <input type="radio" name="rank" value="r3">3*
                                    <input type="radio" name="rank" value="r4">4*
                                    <input type="radio" name="rank" value="r5">5*
                                @endif
                                @if($nRank->ranking == 2)
                                    <input type="radio" name="rank" value="r1">1*
                                    <input type="radio" name="rank" value="r2"checked>2*
                                    <input type="radio" name="rank" value="r3">3*
                                    <input type="radio" name="rank" value="r4">4*
                                    <input type="radio" name="rank" value="r5">5*
                                @endif
                                @if($nRank->ranking == 3)
                                    <input type="radio" name="rank" value="r1">1*
                                    <input type="radio" name="rank" value="r2">2*
                                    <input type="radio" name="rank" value="r3"checked>3*
                                    <input type="radio" name="rank" value="r4">4*
                                    <input type="radio" name="rank" value="r5">5*
                                    @endif
                                @if($nRank->ranking == 4)
                                    <input type="radio" name="rank" value="r1">1*
                                    <input type="radio" name="rank" value="r2">2*
                                    <input type="radio" name="rank" value="r3">3*
                                    <input type="radio" name="rank" value="r4"checked>4*
                                    <input type="radio" name="rank" value="r5">5*
                                @endif
                                @if($nRank->ranking == 5)
                                    <input type="radio" name="rank" value="r1">1*
                                    <input type="radio" name="rank" value="r2">2*
                                    <input type="radio" name="rank" value="r3">3*
                                    <input type="radio" name="rank" value="r4">4*
                                    <input type="radio" name="rank" value="r5"checked>5*
                                @endif
                                <input type="submit" value="Altere sua Avaliação">
                            </form>
                        @endif
                    @endif
                    </div>
                    <div class="box-preco gap">
                        <p class="preco h3"><span class="lt">R$ </span><b>{{ $livro->preco }}</b></p>
                    </div>

                    <div class="descricao gap-big">
                        <p class="txt">{{ $livro->descricao }}<br><br><a href="{{ asset("$livro->download_previo") }}" class="btn-previa btn-neutro"><i class="fas fa-cloud-download-alt"></i> Fazer Download da Prévia</a></p>
                    </div>
                    @if(Auth::id())
                    <div class="box-action">
                        <a href="{{ asset("$livro->download") }}" class="btn-comprar btn-principal">Fazer Download</a>
                        @if(is_null($cFav))
                            <a href="{{ route('livros.favoritar', ['url_amigavel' => $livro->url_amigavel]) }}" class="btn-neutro favoritos"><i class="fas fa-heart"></i> Adicionar aos Favoritos</a>
                        @else
                            <a href="{{ route('livros.desfavoritar', ['url_amigavel' => $livro->url_amigavel]) }}" class="btn-neutro favoritos"><i class="fas fa-heart"></i> Retirar dos Favoritos</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            <div class="box-mais-autor">
                <div class="cabecalho-apresentacao gap">
                    <p class="h2 text-left">Mais Ebooks Deste Autor</p>
                </div>
                <div class="grid-produtos">
                        @if(!empty($livrosUsuario))
                        @foreach($livrosUsuario as $l)
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
                            <a href="{{ route('livros.livro', ['url_amigavel' => $l->url_amigavel]) }}" class="btn-principal">Saiba Mais</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>                
        </div>
    </div>
</section>
@endsection