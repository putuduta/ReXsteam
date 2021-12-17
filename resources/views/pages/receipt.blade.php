@extends('layouts.with-nav-foot')

@section('title', 'Transaction Receipt')
@section('content')
@php
$amount = 0
@endphp    
<div class="main-wrapper">
    <div class="container-fluid">
        @include('include.transaction-nav')
        <h1 class="title-section my-5">Transaction Receipt</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="text-dark">Transaction ID: {{ $transactionHeader->id }}</h4>
                <h4 class="text-dark">Purchased Date: {{ $transactionHeader->created_at }}</h4>
                <hr>

                {{-- 1 cart item --}}
                @foreach ($transactionDetails as $transactionDetail)
                <div class="d-lg-inline-flex align-items-center my-3">
                    <img src="/storage/assets/covers/{{ $transactionDetail->game->cover }}" class="cart-image" alt="">
                    <div class="ml-4">
                        <h2 class="font-weight-bold text-dark">{{ $transactionDetail->game->name }}</h2>
                        <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.{{ $transactionDetail->game->price }}&nbsp;&nbsp;</h5>
                    </div>
                </div>
                <hr>      
                @php
                $amount += $transactionDetail->game->price
                @endphp 
                @endforeach
                <h4 class="text-dark">Total Price: <span class="font-weight-bold">Rp. {{ $amount }}</span></h4>
            </div>
        </div>
    </div>
</div>
@endsection
