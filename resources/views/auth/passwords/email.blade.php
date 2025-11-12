@extends('layouts.appLogin')

@section('title', 'Reset')

@section('content')

<div class="background w-100 h-100 bg-dark position-absolute opacity-100"></div>

<div class="login-box">
    <div class="card card-outline card-info">
        <div class="card-header text-center">
          <img src="{{ asset('logo/logo-parking.png') }}" alt="" style="width:124px">
        </div>
        <div class="card-body">
            <p class="login-box-msg fw-bolder">{{ __('You forgot your password? Here you can easily retrieve a new password.')}}</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="form-group has-feedback">
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <button type="submit" class="btn btn-info btn-block text-white fw-bolder">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>		
</div>
@endsection
