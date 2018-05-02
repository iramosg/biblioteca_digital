@extends('adminlte::page')

@section('title', 'Editar Livro')

@section('content_header')
<h1>Cadastrar Livro</h1>
@endsection

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Livro</h3>
    </div>
    <form action="#" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input class="form-control" type="text" name="titulo" placeholder="Título">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input class="form-control" type="text" name="ano" placeholder="Ano">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input class="form-control" type="text" name="preco" placeholder="Preço">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="form-group text-center">
    <a href="{{ route('admin.livros.index') }}" class="btn btn-lg btn-primary">Voltar</a>
    <input type="submit" class="btn btn-lg btn-success" value="Enviar">
    </form>
</div>

@endsection


@section('js')
<script>
    $('.select2').select2();
</script>
@endsection