@extends('adminlte::page')

@section('title', 'Usuários da Plataforma')

@section('content_header')
<div class="row" style="display: flex;">
    <div class="col-md-6">
        <h1>Usuários da Plataforma</h1>
    </div>
</div>
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Usuários da Plataforma</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="usuarios" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Foto</th>
                    <th>URL Amigável</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($usuarios))
                @foreach($usuarios as $u)
                <tr>
                    <td>{{$u->nome}} {{ $u->sobrenome }}</td>
                    <td>{{$u->email}}</td>
                    <td><img src="{{$u->foto}}" width="150"></td>
                    <td>{{$u->url_amigavel}}</td>
                    <td>{{$u->activated}}</td>
                    <td>
                        <a class="btn btn-block btn-warning" href="{{ route('admin.usuarios.editar', ['id' => $u->id]) }}">EDITAR</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                   <th>Nome</th>
                    <th>E-mail</th>
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
        $('#usuarios').DataTable();
    })
</script>
@endsection