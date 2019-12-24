@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header mt-3" align="center" style="background-color: white">
                        <b style="font-size: 1.3em">LOGIN TO YOUR ACCOUNT</b><br>
                        <p style="font-size: 0.8em">Please Login To Access Weapon Store Area</p>
                    </div>

                <div class="card-body pt-5" style="background-color: rgba(0,0,0,.03)">
                    <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" style="font-weight: bold">
                            <div class="col-md-12">
                                <a href="login/facebook" class="col-md-5 mb-3 btn" style="background-color:#4267B2; color: white; float: left">
                                    Login with Facebook
                                    <img style="width: 30px; height: 30px; margin-left: 15px;" src="{{asset('public/assets/images/facebook_circled.png')}}" alt="logo 1">
                                </a>

                                <a href="login/google" class="col-md-5 mb-3 btn" style="background-color:#DB4437; color: white; float: right">
                                    Login with Google
                                    <img class="logo" style="width: 30px; height: 30px; margin-left: 15px;" src="{{asset('public/assets/images/google_plus_logo.png')}}" alt="logo 1">

                                </a>
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                OR
                            </div>
                        </div>

                        <div class="form-group row">
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email *" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 pt-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 pr-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: red">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('LOGIN') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mt-5 text-center">
                            <div class="col-md-12" style="font-size: 1em; font-weight: bold; color: #6a696a">
                                <p>Don't Have An Account ? <a href="{{ route('register') }}" style="color: #3490dc;">Register Now</a></p>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
