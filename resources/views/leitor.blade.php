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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus posuere porta. In dignissim a libero in malesuada. Proin a odio nisi. Aliquam erat volutpat. Suspendisse feugiat, nibh consequat imperdiet sodales, nibh libero ullamcorper enim, at pretium dui lectus sit amet ex. Aliquam erat volutpat. Nullam sapien metus, eleifend sed felis ac, auctor cursus leo. Aenean quis metus consectetur, semper dolor sed, ullamcorper nibh. Proin feugiat luctus mollis. Donec commodo pretium ipsum, sed volutpat massa mattis sed.
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
                            <a href="#" class="button btn-secundario">Quero ser um produtor!</a>
                        </div>
                    </div>
                </section>					

                <section class="content gap-big">
                    <p class="txt text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus posuere porta. In dignissim a libero in malesuada. Proin a odio nisi. Aliquam erat volutpat. Suspendisse feugiat, nibh consequat imperdiet sodales, nibh libero ullamcorper enim, at pretium dui lectus sit amet ex. Aliquam erat volutpat. Nullam sapien metus, eleifend sed felis ac, auctor cursus leo. Aenean quis metus consectetur, semper dolor sed, ullamcorper nibh. Proin feugiat luctus mollis. Donec commodo pretium ipsum, sed volutpat massa mattis sed.
                    </p>
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