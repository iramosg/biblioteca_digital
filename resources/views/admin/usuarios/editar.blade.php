@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
<h1>Editar Usuário</h1>
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
        <h3 class="box-title">Usuário</h3>
    </div>
    <form action="{{ route('admin.usuarios.edit') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $administrador->id }}">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" placeholder="Nome" value="{{ $administrador->nome }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input class="form-control" type="text" name="sobrenome" placeholder="Sobrenome" value="{{ $administrador->sobrenome }}">                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{ $administrador->email }}">
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="form-group text-center">
    <a href="{{ route('admin.usuarios.admin') }}" class="btn btn-lg btn-primary">Voltar</a>
    <input type="submit" class="btn btn-lg btn-success" value="Enviar">
</form>
</div>

@endsection


@section('js')
<script>
    $('.select2').select2();
</script>
@endsection