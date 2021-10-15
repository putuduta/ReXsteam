@extends('layouts.app')

@section('title-master')
@yield('title')
@endsection

@section('content-wrapper')
@include('include.navbar')
@yield('content')
@include('include.footer')
@endsection
