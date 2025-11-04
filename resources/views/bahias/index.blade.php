@extends('layouts.app')

@section('content')
<section class="content">
    @include('layouts.msg')
</section>
<div class="card mt-2">
    
    <div class="card-header">
        <a href="{{ route('bahias.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
    <h3 class="card-title">Bahias</h3>
    </div>

    <!-- /.card-TABLE-->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Numero</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($bahias as $bahia)
        <tr>
            <td>{{$bahia->id}}</td>
            <td>{{$bahia->numero_bahia}}</td>
            <!-- Cambiar cod del whatsapp -->
            <td>
            <input data-type="bahia" data-id="{{$bahia->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
            data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $bahia->estado ? 'checked':'' }}>
            </td>
            <td>
                <form class="d-inline delete-form" action="{{ route('bahias.destroy', $bahia->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
    </div>
    <!-- /.card-TABLE -->
</div>

@endsection
