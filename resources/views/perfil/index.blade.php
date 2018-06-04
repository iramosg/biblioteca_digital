@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/perfil.css') }}">
@endsection

@section('titlepage')
Perfil de {{ $perfil->nome}}
@endsection


@section('content')

<!-- CONTEUDO -->
<section id="perfil">
    <div class="grid-container">
        <section class="apresentacao-usario gap">
            <div class="capa">
            <img src="{{ asset("$perfil->capa") }}" alt="{{ $perfil->nome}} {{ $perfil->sobrenome}}">
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
                <ul class="menu-esquerda">
                    <li>9999+ Seguidores</li>
                    <li>9999+ Seguindo</li>
                    <li>Publicações</li>
                </ul>
                
                <ul class="menu-direita">
                    <li>Biblioteca</li>
                    <li>Sobre</li>
                    <li>Social</li>
                </ul>
            </nav>
        </section>
        
        <section class="conteudo">
            
        </section>
    </div>
</section>
@endsection