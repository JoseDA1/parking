@extends('layouts.app')

@section('content')

<div class="card mt-2">
    <div class="card-header">
    <h3 class="card-title">Tarifas</h3>
    </div>
    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($model as $md)
        <tr>
            <td>{{$md->id}}</td>
            <td>{{$md->nombre}}</td>
            <td>{{$md->documento}}</td>
            <td>{{$md->telefono}}</td>
            <td>{{$md->email}}</td>
            <td>
            <input data-type="cliente" data-id="{{$md->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $md->estado ? 'checked':'' }}>
            </td>
            <td></td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
