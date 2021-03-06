@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<div class="row" style="display: flex;">
    <div class="col-md-6">
        <h1>Categorias</h1>
    </div>
    <div class="col-md-6 text-right" style="align-self: flex-end; ">
        <a class="btn btn-success btn-lg" href="{{ route('admin.categorias.cadastrar') }}">NOVA CATEGORIA</a>
    </div>
</div>
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Categorias</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="livros" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>URL Amigável</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($categorias))
                @foreach($categorias as $c)
                <tr>
                    <td>{{$c->categoria}}</td>
                    <td><a href="#" target="_blank">{{$c->url_amigavel}}</a></td>
                    <td>{{$c->activated}}</td>
                    <td>
                        <a class="btn btn-block btn-warning" href="{{ route('admin.categorias.editar', ['id' => $c->id]) }}">EDITAR</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                   <th>Categoria</th>
                    <th>URL Amigável</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

@endsection

@section('js')
<script>
    $(function () {
        $('#livros').DataTable();
    })
</script>
@endsection