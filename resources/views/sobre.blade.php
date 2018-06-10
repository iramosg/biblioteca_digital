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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus posuere porta. In dignissim a libero in malesuada. Proin a odio nisi. Aliquam erat volutpat. Suspendisse feugiat, nibh consequat imperdiet sodales, nibh libero ullamcorper enim, at pretium dui lectus sit amet ex. Aliquam erat volutpat. Nullam sapien metus, eleifend sed felis ac, auctor cursus leo. Aenean quis metus consectetur, semper dolor sed, ullamcorper nibh. Proin feugiat luctus mollis. Donec commodo pretium ipsum, sed volutpat massa mattis sed.
                </p>
            </div>
            <div class="cell small-12">
                <p class="txt text-center">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus posuere porta. In dignissim a libero in malesuada. Proin a odio nisi. Aliquam erat volutpat. Suspendisse feugiat, nibh consequat imperdiet sodales, nibh libero ullamcorper enim, at pretium dui lectus sit amet ex. Aliquam erat volutpat. Nullam sapien metus, eleifend sed felis ac, auctor cursus leo. Aenean quis metus consectetur, semper dolor sed, ullamcorper nibh. Proin feugiat luctus mollis.
                </p>
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