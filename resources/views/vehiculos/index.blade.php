@extends('layouts.app')

@section('content')
<section class="content">
    @include('layouts.msg')
</section>
<div class="card mt-2">
    <div class="card-header">
        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
        
    <h3 class="card-title">Vehiculos</h3>
    </div>
    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Tipo de Vehiculo</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($model as $md)
        <tr>
            <td>{{$md->id}}</td>
            <td>{{$md->placa}}</td>
            <td>{{$md->modelo}}</td>
            <td>{{$md->marca?->nombre}}</td>
            <td>{{$md->tipos_vehiculos->nombre}}</td>

            <td class="d-flex justify-content-center">
                <img src="{{asset('uploads/vehiculos/'.$md->image)}}" alt="Sin Imagen" class="img-fluid" style="height:50px;" >
            </td>
            <td>
            <input data-type="vehiculo" data-id="{{$md->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $md->estado ? 'checked':'' }}>
            </td>
            <td>
                <form class="d-inline delete-form" action="{{ route('vehiculos.destroy', $md) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                </form>
                <a href="{{ route('vehiculos.edit',$md->id) }}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>

            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
