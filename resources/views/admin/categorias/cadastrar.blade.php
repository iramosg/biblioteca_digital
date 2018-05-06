@extends('adminlte::page')

@section('title', 'Cadastrar Categoria')

@section('content_header')
<h1>Cadastrar Categoria</h1>
@endsection

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Categoria</h3>
    </div>
    <form action="{{ route('admin.categorias.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" placeholder="Nome">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="icone">Ícone</label>
                        <input class="form-control" type="file" name="icone">
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