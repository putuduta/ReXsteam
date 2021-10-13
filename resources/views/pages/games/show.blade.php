@extends('layouts.app')

@section('content')
@include('include.navbar')
<div class="main-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="#">{{ $game->category }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $game->name }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-8">
                <video controls width="100%">
                    <source src="/storage/assets/trailers/{{ $game->trailer }}" type="video/webm">
                </video>
            </div>
            <div class="col-lg-4">
                <img src="/storage/assets/covers/{{ $game->cover }}" width="100%" alt="">
                <h1 class="mt-3 text-dark font-weight-bold">{{ $game->name }}</h1>
                <h5 class="font-weight-normal">{{ $game->description }}</h5>

                <h5 class="mt-3 font-weight-bold">Genre: <span class="font-weight-normal">{{ $game->category }}</span>
                </h5>
                <h5 class="mt-3 font-weight-bold">Release Date: <span
                        class="font-weight-normal">{{ date_format($game->created_at,"F d, Y") }}</span>
                </h5>
                <h5 class="mt-3 font-weight-bold">Developer: <span
                        class="font-weight-normal">{{ $game->developer }}</span>
                </h5>
                <h5 class="mt-3 font-weight-bold">Publisher: <span
                        class="font-weight-normal">{{ $game->publisher }}</span>
                </h5>
            </div>
        </div>
        <div class="card bg-muted shadow mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Buy {{ $game->name }}</h4>
                    <button class="btn btn-dark p-3">
                        <h5 class="m-0">Rp.{{ $game->price }}&nbsp;&nbsp;|&nbsp;&nbsp;<i
                                class="fa fa-shopping-cart"></i> ADD TO
                            CART</h5>
                    </button>
                </div>
            </div>
        </div>

        <h3 class="text-dark font-weight-bold mt-4">ABOUT THIS GAME</h3>
        <hr>
        <p>
            {{ $game->long_description }}
        </p>
    </div>
</div>
@include('include.footer')
@endsection
