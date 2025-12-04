@extends('layouts.app')

@section('content')
<section class="content">
    @include('layouts.msg')
</section>
<div class="card mt-2">
    <div class="card-header">
        <a href="{{ route('tiposvehiculos.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>

    <h3 class="card-title">Tipo de Vehiculos</h3>
    </div>
    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Hora</th>
                <th>Dia</th>
                <th>Mes</th>
                <th>Media Hora</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($model as $md)
        <tr>
            <td>{{$md->id}}</td>
            <td>{{$md->nombre}}</td>
            <td>{{$md->tarifas->valor_hora}}</td>
            <td>{{$md->tarifas->valor_dia}}</td>
            <td>{{$md->tarifas->valor_mensuales}}</td>
            <td>{{$md->tarifas->valor_parcial}}</td>

            <td>
            <input data-type="tipovehiculo" data-id="{{$md->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $md->estado ? 'checked':'' }}>
            </td>
            <td>
                <form class="d-inline delete-form" action="{{ route('tiposvehiculos.destroy', $md->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                </form>
                <a href="{{ route('tiposvehiculos.edit',$md->id) }}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>

            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
