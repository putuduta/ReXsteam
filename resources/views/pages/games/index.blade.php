@extends('layouts.with-nav-foot')

@section('title', 'Manage Games')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        <h1 class="title-section mb-4">Manage Games</h1>
        <div class="row">
            <div class="col-lg-5">
                <form action="{{ route('games.filter') }}" method="GET">
                    @csrf
                    <h5 class="font-weight-bold mt-3">Filter by Games Name</h5>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                        <input type="text" name="name" placeholder="Game Name" class="form-control" value="{{ $name }}">
                    </div>

                    <h5 class="font-weight-bold mt-4 mb-3">Filter by Games Category</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="category" value="Idle"
                                    name="category" {{ str_contains($category, "Idle") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Idle
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Horror" name="category"
                                    {{ str_contains($category, "Horror") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Horror
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Adventure" name="category"
                                    {{ str_contains($category, "Adventure") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Adventure
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Action" name="category"
                                    {{ str_contains($category, "Action") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Action
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Sports" name="category"
                                    {{ str_contains($category, "Sports") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Sports
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Strategy" name="category"
                                    {{ str_contains($category, "Strategy") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Strategy
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Role Playing" name="category"
                                    {{ str_contains($category, "Role-playing") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Role-playing
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Puzzle" name="category"
                                    {{ str_contains($category, "Puzzle") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Puzzle
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Simulation" name="category"
                                    {{ str_contains($category, "Simulation") ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    Simulation
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark mt-3">Search</button>
                </form>
            </div>
        </div>
    </div>

    {{-- HASIL SEARCH (HARUSNYA GANTI PAS DISEARCH) --}}
    @if (isset($games))
    @if ($games->count() > 0)
    <div class="container-fluid">
        <div class="row">
            @foreach ($games as $game)
            <div class="col-md-3 my-3">
                <a href="{{ route('games.show', $game) }}" class="text-reset text-decoration-none text-dark">
                    <div class="card card-game shadow-sm">
                        <img src="/storage/assets/covers/{{ $game->cover }}" class="card-game-img" alt="">
                        <div class="card-body d-flex align-items-end inner-card-game">
                            <div class="card card-inner-card-game">
                                <h3 class="font-weight-bold">{{ $game->name }}</h3>
                                <p class="m-0">{{ $game->category }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('games.edit', $game) }}" class="btn btn-block bg-white py-3 mt-2">
                        <h5 class="m-0 font-weight-bold text-dark text-left"><i class="fa fa-edit"></i>
                            Update
                        </h5>
                    </a>
                    <button class="btn btn-block bg-white py-3" data-toggle="modal"
                        data-target="#confirm-delete-{{ $game->id }}">
                        <h5 class="m-0 font-weight-bold text-dark text-left"><i class="fa fa-trash"></i>
                            Delete
                        </h5>
                    </button>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    {{ $games->links() }}

    @foreach ($games as $game)
    <div class="modal fade" id="confirm-delete-{{ $game->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm-delete">Delete Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this game? All your data will be permanently
                    removed from our servers forever. This action cannot be undone
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn border bg-white text-dark" data-dismiss="modal">Cancel</button>

                    <form action="{{ route('games.destroy', $game) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{ $games->withQueryString()->links() }}
    @else
    <div class="container-fluid mt-3">
        <h3>There are no games content can be showed right now</h3>
    </div>
    @endif
    @else
    <div class="container-fluid mt-3">
        <h3>There are no games content can be showed right now</h3>
    </div>
    @endif



    <a href="{{ route('games.create') }}" class="btn btn-lg btn-primary rounded-circle"
        style="position: fixed;bottom:20px;right: 10px;z-index:99">
        <h1 class="m-0">+</h1>
    </a>




</div>
@endsection
