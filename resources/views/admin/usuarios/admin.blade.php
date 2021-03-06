@extends('adminlte::page')

@section('title', 'Usuários Administradores')

@section('content_header')
<div class="row" style="display: flex;">
    <div class="col-md-6">
        <h1>Usuários Administradores</h1>
    </div>
    <div class="col-md-6 text-right" style="align-self: flex-end; ">
        <a class="btn btn-success btn-lg" href="{{ route('admin.usuarios.cadastrar') }}">NOVO USUÁRIO</a>
    </div>
</div>
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Usuários Administradores</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="usuarios" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($administradores))
                @foreach($administradores as $a)
                <tr>
                    <td>{{$a->nome}} {{ $a->sobrenome }}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->activated}}</td>
                    <td>
                        <a class="btn btn-block btn-warning" href="{{ route('admin.usuarios.editar', ['id' => $a->id]) }}">EDITAR</a>
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