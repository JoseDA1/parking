@extends('layouts.app')

@section('content')
<section class="content">
    @include('layouts.msg')
</section>
<div class="card mt-2">
    <div class="card-header">
        <a href="{{ route('salidas.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
        
    <h3 class="card-title">Registrar Salidas</h3>
    </div>
    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Bahia</th>
                <th>Placa</th>
                <th>Salida</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
        
        @foreach($model as $sa)
        <tr>
            <td>{{$sa->id}}</td>
            <td>{{$sa->registro->bahias->numero_bahia}}</td>
            <td>{{$sa->registro->vehiculos->placa}}</td>
            <td>{{$sa->fecha_salida}}</td>
            <td>
            <input data-type="salida" data-id="{{$sa->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $sa->estado ? 'checked':'' }}>
            </td>
            <td>
                <form class="d-inline delete-form" action="{{ route('salidas.destroy', $sa) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                </form>
                <a href="{{ route('salidas.edit',$sa->id) }}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>

            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
