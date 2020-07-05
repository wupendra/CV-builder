@extends('component.frontend.layouts.front')
@section('page_title', 'Make My CV')
@section('stylesheets')
    @parent
@endsection
@section('content')
<div class="container brdcrmb-sec">
    <div class="btn-group btn-breadcrumb">
    <a href="{{ route('home') }}" class="btn btn-default btn-myway"><i class="fa fa-home"></i></a>
        <a href="#" class="btn btn-default">Log In</a>
    </div>
</div><!--breadcrumb-->
<div class="container">
    <div class="row justify-content-center login-form">
        <div class="col-md-8">
            <div class="row">
                <div class="login-head intro-header-sec col-md-12">
                    <h4>{{ __('Login') }}</h4>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-7 offset-md-4">
                                <div class="form-check pull-right remember-me">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 pull-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if (Route::has('register'))
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 pull-right">
                                <span>Do not have an account? </span>
                                <a href="{{ route('register') }}" class="btn btn-success">
                                    {{ __('register') }}
                                </a>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascripts')
    @parent
@endsection
@endsection
