@extends('layouts.appLogin')

@section('title', 'Login')

@section('content')
<!-- #343a40 -->
<!-- <div class="background w-75 h-75 bg-dark position-absolute opacity-50" style="background-image: url({{ asset('backend/dist/img/parqueobackground.png') }})"></div> -->
<div class="background w-100 h-100 bg-dark position-absolute opacity-100"></div>
    <div class="login-box">
        <div class="card card-outline card-info">
            <div class="card-header text-center">
                <img src="{{ asset('logo/logo-parking.png') }}" alt="" style="width:124px">
            </div>
            <div class="card-body">
                <p class="login-box-msg fw-bolder">{{ __('Log In') }}</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Correo">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Contraseña">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col fw-bold">
                            <button type="submit" class="btn btn-info btn-block text-white">{{ __('Log In') }}</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12  text-center ">
                            <p class="mb-1 btn border text-center">

                            <!-- Para Recordar la contraseña -->
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-reset text-decoration-none">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </p>
                            <p class="mb-1 btn border text-center">
                                <a href="{{ route('register') }}" class="text-reset text-decoration-none">{{ __('Register a new membership') }}</a>
                            </p>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
