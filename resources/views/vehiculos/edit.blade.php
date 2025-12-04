@extends ('layouts.app')

@section ('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('vehiculos.update', $vehiculo) }} " enctype="multipart/form-data">
							@csrf
							@method('PUT')

							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Placa <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="placa" autocomplete="off" value="{{ $vehiculo->placa }}" required>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Modelo</label>
											<input type="text" class="form-control" name="modelo" autocomplete="off" value="{{ $vehiculo->modelo }}">
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Marca <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="marca_id" id="marca">
												@foreach($marca as $mc)
													<option {{ $mc->id == $vehiculo->marca_id ? 'selected' : '' }} value="{{ $mc->id }}">{{ $mc->nombre }}</option>
												@endforeach
												
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Tipo Vehiculo <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="tipos_vehiculos_id" id="tipos_vehiculos">
												@foreach($tiposvehiculo as $tv)
													<option {{ $tv->id == $vehiculo->tipos_vehiculos_id ? 'selected' : '' }} value="{{ $tv->id }}">{{ $tv->nombre }}</option>
												@endforeach
												
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
										<div class="form-group label-floating">
											<label class="control-label">Cargar Imagen</label>
											<input type="file" class="form-control" name="image" autocomplete="off" value="{{ $vehiculo->image }}" multiple accept="image/*">
										</div>
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										@if ($vehiculo->image)
											<div class="mb-3">
												<label class="control-label">Imagen</label><br>
												<img src="{{ asset('uploads/vehiculos/' . $vehiculo->image) }}" alt="Imagen actual del vehículo" style="max-width: 200px; height: auto;">
												<br>
											</div>
										@endif
									</div>
								</div>
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
								<input type="hidden" class="form-control" name="estado" value="{{ $vehiculo->estado }}">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ $vehiculo->registradoPor }}">
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('vehiculos.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
