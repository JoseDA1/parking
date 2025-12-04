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
							<div class="card-body">
								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Cliente</label>
											<input type="text" class="form-control" name="nombre" value="{{$pago->salida->registro->clientes->nombre}}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Telefono</label>
											<input type="text" class="form-control" name="telefono" value="{{$pago->salida->registro->clientes->telefono}}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
											<input type="text" class="form-control" name="email" value="{{$pago->salida->registro->clientes->email}}" disabled>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Ingreso</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->salida->registro->fecha_ingreso}}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Salida</label>
											<input type="text" class="form-control" name="salida" value="{{$pago->salida->fecha_salida}}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Total</label>
											<input type="text" class="form-control"name="total" value="{{$pago->valor_total}}" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Valor Media Hora</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->salida->registro->vehiculos->tipos_vehiculos->tarifas->valor_parcial}}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Valor Hora</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->salida->registro->vehiculos->tipos_vehiculos->tarifas->valor_hora}}" disabled>
											
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Valor Día</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->salida->registro->vehiculos->tipos_vehiculos->tarifas->valor_dia}}" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Valor Mensual</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->salida->registro->vehiculos->tipos_vehiculos->tarifas->valor_mensuales}}" disabled>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Placa</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->salida->registro->vehiculos->placa}}" disabled>
											
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group label-floating">
											<label class="control-label">Metodo de Pago</label>
											<input type="text" class="form-control" name="ingreso" value="{{$pago->metodo_pago->nombre}}" disabled>
										</div>
									</div>
								</div>
								
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('pagos.index') }}" class="btn border  btn-block btn-flat">Regresar</a>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
