@extends('partials.template')

@section('csspage')
<link rel="stylesheet" href="{{ asset('css/custom/categoria.css') }}">
@endsection

@section('titlepage')
Livros
@endsection

@section('content')

{{ $livro->titulo }}<br>
{{ $livro->capa }}<br>
{{ $livro->ano }}<br>
{{ $livro->descricao }}<br>
{{ $livro->preco }}<br>
{{ $livro->download_previo }}<br>
{{ $livro->download }}<br>
{{ $livro->isbn }}<br>
{{ $livro->categoria->categoria }}

@endsection