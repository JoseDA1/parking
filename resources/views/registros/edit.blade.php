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
						<form method="POST" action="{{ route('registros.update',$registro) }}">

							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Cliente <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="clientes_id" id="cliente" autocomplete="off" required>
												<!-- @foreach($cliente as $cl)
													<option value="{{ $cl->id }}">{{ $cl->nombre }}</option>
												@endforeach -->
												@foreach($cliente as $cl)
													<option {{ $cl->id == $registro->clientes_id ? 'selected' : '' }} value="{{ $cl->id }}">{{ $cl->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Bahia <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="bahias_id" id="bahia" autocomplete="off"  required>
												@foreach($bahia as $bh)
													<option {{ $bh->id == $registro->bahias_id ? 'selected' : '' }} value="{{ $bh->id }}">{{ $bh->numero_bahia }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Vehiculo <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="vehiculos_id" id="vehiculo" autocomplete="off" required>
												@foreach($vehiculo as $vh)
													<option {{ $vh->id == $registro->vehiculos_id ? 'selected' : '' }} value="{{ $vh->id }}">{{ $vh->placa }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
							<input type="hidden" class="form-control" name="estado" value="{{$registro->estado}}">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ $registro->registradoPor }}">
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('registros.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
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
