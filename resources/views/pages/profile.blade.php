@extends('layouts.with-nav-foot')

@section('title', 'Profile')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 my-3">
                @include('include.sidebar')
            </div>
            <div class="col-lg-9 my-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body my-3">
                        <h5>{{ auth()->user()->username }} Profile</h5>
                        <p class="text-muted">This information will be displayed publicly so be careful what you share.
                        </p>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-2 order-md-2">
                                    <img src="/storage/assets/profile/{{ auth()->user()->profile_picture ? auth()->user()->profile_picture : 'user-default.png' }}"
                                        class="w-100 rounded-circle" alt=""
                                        style="width: 100%;height:65%;object-fit:cover">

                                </div>
                                <div class="col-md-10 order-md-1">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-4">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ auth()->user()->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-4">
                                                <label for="level">Level</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ auth()->user()->level }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" class="form-control" name="full_name"
                                            value="{{ auth()->user()->full_name }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="profile_picture">Upload profile picture</label>
                                        <input type="file"
                                            class="form-control @error('profile_picture') is-invalid @enderror"
                                            name="profile_picture" id="profile_picture">
                                        @error('profile_picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="current_password">Current password</label>
                                <input type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" value="{{ old('current_password') }}">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted">Fill out this field to check if you are authorized</small>
                            </div>
                            <div class="form-group mb-4">
                                <label for="new_password">New password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password" value="{{ old('new_password') }}">
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted">Only if you want to change your password</small>
                            </div>
                            <div class="form-group mb-4">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password"
                                    class="form-control  @error('confirm_password') is-invalid @enderror"
                                    name="confirm_password" value="{{ old('confirm_password') }}">
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted">Only if you want to change your password</small>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
