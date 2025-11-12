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
											<label class="control-label">Registros <strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="registros" autocomplete="off" value="{{ old('registros') }}" required>
												@foreach($registros as $rg)
													<option value="{{ $rg->id }}">{{ $rg->id }} - {{ $rg->clientes_id }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group label-floating">
											<label class="control-label">Metodos de Pago <strong style="color:red;">(*)</strong></label>
											<!-- <select class="form-control" name="metodospagos" autocomplete="off" value="{{ old('metodospagos') }}" required>
												@foreach($metodospagos as $mt)
													<option value="{{ $mt->id }}">{{ $mt->nombre }}</option>
												@endforeach
											</select> -->
											<select class="form-control" name="metodospagos" id="metodospagos" value="{{ old('metodospagos') }}">
												<option value>Seleccione Metodo de Pago</option>
												@foreach($metodospagos as $mt)
													<option value="{{ $mt->id }}">{{ $mt->nombre }}</option>
												@endforeach
                    						</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Total <strong style="color:red;">(*)</strong></label>
											<input type="number" class="form-control" name="total" autocomplete="off" value="{{ old('total') }}">
										</div>
									</div>
								</div>
								<!-- <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradoPor" value="{{ Auth::user()->id }}"> -->
							</div>
							<input type="hidden" class="form-control" name="estado" value="1">
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
