@extends('adminlte::page')

@section('title', 'Livros')

@section('content_header')
<div class="row" style="display: flex;">
    <div class="col-md-6">
        <h1>Livros</h1>
    </div>
    <div class="col-md-6 text-right" style="align-self: flex-end; ">
        <a class="btn btn-success btn-lg" href="#">NOVO LIVRO</a>
    </div>
</div>
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Livros</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="livros" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Capa</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Download</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($livros))
                @foreach($livros as $l)
                <tr>
                    <td>{{$l->titulo}}</td>
                    <td><img src="{{$l->capa}}" alt="" width="150"></td>
                    <td>{{$l->autor->nome}}</td>
                    <td>{{$l->categoria->categoria}}</td>
                    <td>{{$l->preco}}</td>
                    <td>--</td>
                    <td>
                        <a class="btn btn-block btn-info" href="#">VER</a>
                        <a class="btn btn-block btn-warning" href="#">EDITAR</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Capa</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Download</th>
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