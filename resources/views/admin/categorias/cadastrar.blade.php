@extends('adminlte::page')

@section('title', 'Cadastrar Categoria')

@section('content_header')
<h1>Cadastrar Categoria</h1>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                        <label for="categoria">Categoria</label>
                        <input class="form-control" type="text" name="categoria" placeholder="Categoria" value="{{ old('categoria') }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="categoria">URL Amigável</label>
                        <input class="form-control" type="text" name="url_amigavel" placeholder="URL Amigável" value="{{ old('url_amigavel') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="icone">Ícone</label>
                        <input class="form-control" type="file" name="icone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input class="form-control" type="file" name="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group text-center">
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-lg btn-primary">Voltar</a>
        <input type="submit" class="btn btn-lg btn-success" value="Enviar">
    </form>
</div>

@endsection


@section('js')
<script>
    $('.select2').select2();
</script>
@endsection