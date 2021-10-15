@extends('layouts.app')

@section('title-master', 'Login')
@section('content')
<div class="background-auth">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 px-lg-5 text-white">

                <h1 class="title-auth text-white mb-4">Login Page</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="username">{{ __('Username') }}</label>
                        <input id="username" type="username"
                            class="form-control @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Sign In') }}
                    </button>

                    @if (Route::has('login'))
                    <div class="text-right mt-3">
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Dont have an account?') }}
                        </a>
                    </div>
                    @endif
                </form>
            </div>

            <div class="col-md-6 m-0 p-0">
                <img src="/storage/assets/image-auth.jpg" class="image-auth" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
