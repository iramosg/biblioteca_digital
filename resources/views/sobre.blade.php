@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/sobre.css') }}">
@endsection

@section('titlepage')
Sobre
@endsection


@section('content')
<!-- CONTEUDO -->
<section id="sobre">

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell small-12 gap-big">
                <img src="images/content/banner-about.jpg" alt="">
            </div>
            <div class="cell small-12 medium-6 gap-big">
                <img src="images/livro-biblioteca-digital.png" alt="Logo Biblioteka Digital">
            </div>
            <div class="cell small-12 medium-6 gap-big">
                <p class="txt text-center">
                        A Biblioteka Digital é uma plataforma voltada à produtores e leitores de livros digitais. A idéia inicial é que os usuários façam suas próprias publicações sem precisar de uma editora em um processo simples e rápido, podendo contar com apoios dos usuários da plataforma   para divulgar e melhorar os seus produtos.                </p>
                        <p class="txt text-center">
                                Também funcionará como uma grande rede social voltada para leitores e escritores, pois podemos visualizar no perfil do usuário suas publicações, sua biblioteca de e-books adquiridos e entrar em contato com outro usuário.                </p>
            </div>
            <div class="cell small-12">
                
            </div>
        </div>
    </div>

</section>
@endsection

@section('jspage')
// Inicializando
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
});
@endsection