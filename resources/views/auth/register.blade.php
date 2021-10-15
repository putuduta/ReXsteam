@extends('layouts.app')

@section('title-master', 'Register')
@section('content')
<div class="background-auth">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 px-lg-5 text-white">

                <h1 class="title-auth text-white mb-4">Register Page</h1>
                <form method="POST" action="{{ route('register') }}">
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
                        <label for="full_name">{{ __('Full Name') }}</label>
                        <input id="full_name" type="username"
                            class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                            value="{{ old('full_name') }}">
                        @error('full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="role">{{ __('Role') }}</label>

                        <select class="form-control" name="role" id="role" @error('role') is-invalid @enderror>
                            <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-5">
                        {{ __('Sign Up') }}
                    </button>

                    @if (Route::has('login'))
                    <div class="text-right mt-3">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
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
