@extends('layouts.with-nav-foot')

@section('title', 'Manage Games')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        <h1 class="title-section mb-4">Manage Games</h1>
    </div>
    <a href="{{ route('games.create') }}" class="btn btn-lg btn-primary rounded-circle"
        style="position: fixed;bottom:10px;right: 10px;z-index:99">+</a>
</div>
@endsection
