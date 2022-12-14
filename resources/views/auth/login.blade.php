@extends('layouts.frontend.web')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-outline-danger alert-dismissible mt-5" role="alert">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                                <div class="alert-message">
                                <span>{{$error}}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('login') }}">

                        <h4 class="text-center">{{ __('Enter your login details to access the dashboard') }}</h4>

                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <button type="submit" class="col-md-12 btn btn-primary mb-3">
                                {{ __('Login') }}
                            </button>

                            <div class="col-md-12">
                                Don't have an Account? <a class="btn-link" href="{{ route('register') }}">Register</a> OR 

                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
