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
						<form method="POST" action="{{ route('pagos.store') }}">
							@csrf
							<div class="card-body">
								
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Salida <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="salida" id="salida" value="{{ old('salida') }}" required>
												<option value>Salida</option>
												@foreach($salidas as $sa)
													<option value="{{ $sa->id }}"
													data-ingreso="{{ $sa->registro->fecha_ingreso }}"
													data-salida="{{ $sa->fecha_salida }}"
													data-tarifa="{{ $sa->registro->vehiculos->tipos_vehiculos->tarifas->id}}"
													data-hora="{{ $sa->registro->vehiculos->tipos_vehiculos->tarifas->valor_hora}}"
													data-parcial="{{ $sa->registro->vehiculos->tipos_vehiculos->tarifas->valor_parcial}}"
													data-dia="{{ $sa->registro->vehiculos->tipos_vehiculos->tarifas->valor_dia}}"
													data-mensual="{{ $sa->registro->vehiculos->tipos_vehiculos->tarifas->valor_mensuales}}">
													{{ $sa->registro->vehiculos->placa }} - {{ $sa->registro->clientes->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Metodos de Pago <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="metodospagos" id="metodospagos" value="{{ old('metodospagos') }}" required>
												<option value>Seleccione Metodo de Pago</option>
												@foreach($metodospagos as $mt)
													<option value="{{ $mt->id }}">{{ $mt->nombre }}</option>
												@endforeach
                   							</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<div class="form-group label-floating">
												<label class="control-label">Ingreso</label>
												<input type="text" class="form-control" id="ingresofecha" name="ingresofecha" value="" disabled>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<div class="form-group label-floating">
												<label class="control-label">Salida</label>
												<input type="text" class="form-control" id="salidafecha" name="salidafecha" value="" disabled>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<div class="form-group label-floating">
												<label class="control-label">Tarifa</label>
												<input type="text" class="form-control" id="tarifa" name="tarifa" value="" disabled>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<div class="form-group label-floating">
												<label class="control-label">Total</label>
												<input type="text" class="form-control" id="total" name="total" value="" disabled>
											</div>
										</div>
									</div>
								</div>
								
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
							<input type="hidden" class="form-control" name="estado" value="1">
							<input type="hidden" id="valor_total" name="valor_total" value="0">
							<input type="hidden" id="salidas_id" name="salidas_id" value="">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}">
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('pagos.index') }}" class="btn border  btn-block btn-flat">Cancelar</a>
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
