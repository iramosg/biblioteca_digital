@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/usuario.css') }}">
@endsection

@section('titlepage')
Leitor
@endsection


@section('content')
<!-- CONTEUDO -->
<section id="usuario" class="leitor">

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell small-12 banner gap-big">
                <img src="images/content/banner-leitor.jpg" alt="Leitor">
            </div>
            <div class="cell small-12">

                <section class="content gap-big">
                    <p class="txt text-center">
                        Conheça e viva novas experiências com nossa plataforma, acesse e divirta-se com as histórias dos produtores independentes que oferecem o melhor conteúdo, se você é fã de leitura veio ao lugar certo. Conhecimento, emoção, entretenimento e muita diversão é o que te esperam.
                    </p>
                </section>

                <section class="produtor apresentacao-user gap-big">
                    <div class="grid-container">
                        <div class="apresentacao">
                            <div class="item">
                                <div class="icon">
                                    <img src="images/icones/icon-heart.png" alt="">
                                </div>
                                <div class="conteudo">
                                    <p class="h4">
                                        Favorite os Ebooks que mais Gostar
                                    </p>
                                    <p class="txt">
                                        Deixe que todos saibam que aquele produto é incrível!
                                    </p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="icon">
                                    <img src="images/icones/icon-cloud.png" alt="">
                                </div>
                                <div class="conteudo">
                                    <p class="h4">
                                        Conheça o Ebook com Download Prévio
                                    </p>
                                    <p class="txt">
                                        Fique a vontade para conhecer o ebook antes de comprá-lo
                                    </p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="icon">
                                    <img src="images/icones/icon-group.png" alt="">
                                </div>
                                <div class="conteudo">
                                    <p class="h4">
                                        Fique por Dentro de seus ebooks Favoritos
                                    </p>
                                    <p class="txt">
                                        Participe de grupos e compartilhe com todos o que masi gostou em um produto
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="action">
                        <a href="{{ route('escritor') }}" class="button btn-secundario">Quero ser um produtor!</a>
                        </div>
                    </div>
                </section>					

                <section class="content gap-big">
                    <p class="txt text-center">
                            Ainda não está convencido? Nossa plataforma oferece também interatividade entre leitor e produtor tendo a disposição grupos onde os leitores poderão levantar suas concepções sobre a obra que estiver lendo assim fazendo um feedback da leitura direito para o autor do e-book, além de diversos planos para navegar na plataforma de acordo com suas necessidades e muita informação para seu conhecimento estar sempre em dia.                    </p>
                </section>
            </div>
        </div>
    </div>

</section>
@endsection

@section('jspage')
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