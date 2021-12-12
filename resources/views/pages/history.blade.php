@extends('layouts.with-nav-foot')

@section('title', 'Transaction History')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 my-3">
                @include('include.sidebar')
            </div>
            <div class="col-lg-9 my-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-dark my-3">
                        <h4 class="font-weight-bold mb-4">Transaction History</h4>

                        @if ($transactionHeaders->count() > 0)
                        @foreach ($transactionHeaders as $transactionHeader)
                        @php
                        $amount = 0
                        @endphp
                        <div class="my-4">
                            <h5>Transaction ID: {{ $transactionHeader->id }}</h5>
                            <h5>Purchased Date: {{ $transactionHeader->created_at }}</h5>

                            <div class="row mt-3">
                                @foreach ($transactionDetails as $transactionDetail)
                                @if ($transactionDetail->transaction_id == $transactionHeader->id)
                                <div class="col-lg-3">
                                    <img src="/storage/assets/covers/{{ $transactionDetail->game->cover }}"
                                        class="w-100" alt="">
                                </div>
                                @php
                                $amount += $transactionDetail->game->price
                                @endphp
                                @endif
                                @endforeach
                            </div>
                            <h5 class="mt-3">Total Price: <span class="font-weight-bold">{{ $amount }}</span></h5>
                            <hr>
                        </div>
                        @endforeach
                        @else
                        <h5 class="mt-3">Your transaction history is empty.</span></h5>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection