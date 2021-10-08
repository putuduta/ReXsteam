@extends('layouts.app')

@section('content')
@include('include.navbar')
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 my-3">
                @include('include.sidebar')
            </div>
            <div class="col-lg-9 my-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body my-3">
                        <h5>Friends</h5>

                        <div class="mt-5">
                            <h4 class="font-weight-bold mb-3">Add Friend</h4>
                            <form action="{{ route('friends.store') }}" method="POST">
                                @csrf
                                <div class="form-group d-inline-flex">
                                    <input type="text" name="username" id="username" placeholder="Username"
                                        class="form-control mr-3">
                                    <button type="submit" class="btn btn-dark">Add</button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-5">
                            <h4 class="font-weight-bold mb-3">Incoming Friend Request</h4>
                            <div class="row">
                                @forelse ($incomingRequests as $request)
                                <div class="col-lg-4">
                                    <div class="card shadow-sm border-0 bg-light">
                                        <div class="card-body my-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-inline-flex align-items-center">
                                                        <h5 class="m-0">{{ $request->user->full_name }}</h5>
                                                        <button
                                                            class="btn btn-sm btn-success ml-3 rounded-circle">{{ $request->user->level }}</button>
                                                    </div>
                                                    <p>{{ $request->user->role }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <img src="/storage/assets/{{ $request->user->profile_picture ? $request->user->profile_picture : 'user-default.png' }}"
                                                        alt="" class="w-100 rounded-circle">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <form action="{{ route('friends.accept', ['id' => $request->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block">Accept</button>
                                                    </form>
                                                </div>
                                                <div class="col-6">
                                                    <form action="{{ route('friends.reject', ['id' => $request->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-block">Reject</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">There is no incoming friend request.</div>
                                @endforelse
                            </div>
                        </div>

                        <div class="mt-5">
                            <h4 class="font-weight-bold mb-3">Pending Friend Request</h4>
                            <div class="row">
                                @forelse ($pendingRequests as $request)
                                <div class="col-lg-4">
                                    <div class="card shadow-sm border-0 bg-light">
                                        <div class="card-body my-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-inline-flex align-items-center">
                                                        <h5 class="m-0">{{ $request->friend->full_name }}</h5>
                                                        <button
                                                            class="btn btn-sm btn-success ml-3 rounded-circle">{{ $request->user->level }}</button>
                                                    </div>
                                                    <p>{{ $request->friend->role }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <img src="/storage/assets/{{ $request->friend->profile_picture ? $request->friend->profile_picture : 'user-default.png' }}"
                                                        alt="" class="w-100 rounded-circle">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <form action="{{ route('friends.reject', ['id' => $request->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-block">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">There is no incoming friend request.</div>
                                @endforelse
                            </div>
                        </div>
                        <div class="my-5">
                            <h4 class="font-weight-bold mb-3">Friends</h4>
                            <div class="row">
                                @forelse ($friends as $friend)
                                <div class="col-lg-4">
                                    <div class="card shadow-sm border-0 bg-light">
                                        <div class="card-body my-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-inline-flex align-items-center">
                                                        <h5 class="m-0">
                                                            {{ $friend->user_id == auth()->user()->id ? $friend->friend->full_name : $friend->user->full_name }}
                                                        </h5>
                                                        <button
                                                            class="btn btn-sm btn-success ml-3
                                                                rounded-pill">{{ $friend->user_id == auth()->user()->id ? $friend->friend->level : $friend->user->level }}</button>
                                                    </div>
                                                    <p>{{ ucwords($friend->user->role) }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <img src="/storage/assets/{{ $friend->user_id == auth()->user()->id ? 
                                                    ($friend->friend->profile_picture ? $friend->friend->profile_picture : 'user-default.png') 
                                                    : ($friend->user->profile_picture ? $friend->user->profile_picture : 'user-default.png') }}"
                                                        alt="" class="w-100 rounded-circle">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">There is no friend.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('include.footer')
@endsection
