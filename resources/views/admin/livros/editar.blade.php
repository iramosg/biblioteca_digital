@extends('adminlte::page')

@section('title', 'Editar Livro')

@section('content_header')
<h1>Editar Livro</h1>
@endsection

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cidade</h3>
    </div>
    <form action="#" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input class="form-control" type="text" name="cidade" placeholder="Cidade">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control select2">
                            @foreach($estados as $estado)
                            <option value="{{$estado->id}}">{{ $estado->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="form-group text-center">
    <a href="{{ route('cidades.index') }}" class="btn btn-lg btn-primary">Voltar</a>
    <input type="submit" class="btn btn-lg btn-success" value="Enviar">
</form>
</div>

@endsection


@section('js')
<script>
    $('.select2').select2();
</script>
@endsection