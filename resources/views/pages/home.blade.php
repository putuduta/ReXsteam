@extends('layouts.with-nav-foot')

@section('title', 'Home')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        <h1 class="title-section mb-4">Top Games</h1>
        <div class="row">
            @foreach ($games as $game)
            <div class="col-md-3 my-3">
                <a href="{{ route('games.show', $game) }}" class="text-reset text-decoration-none">
                    <div class="card card-game shadow-sm">
                        <img src="/storage/assets/covers/{{ $game->cover }}" class="card-game-img" alt="">
                        <div class="card-body d-flex align-items-end inner-card-game">
                            <div class="card card-inner-card-game">
                                <h3 class="font-weight-bold">{{ $game->name }}</h3>
                                <p class="m-0">{{ $game->category }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
