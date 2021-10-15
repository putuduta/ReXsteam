@extends('layouts.with-nav-foot')

@section('title', 'Transaction Receipt')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        @include('include.transaction-nav')
        <h1 class="title-section my-5">Transaction Receipt</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="text-dark">Transaction ID: lakdsjasldkjsalkdjsa</h4>
                <h4 class="text-dark">Purchased Date: 21-05-2021 08:11:11</h4>
                <hr>

                {{-- 1 cart item --}}
                <div class="d-lg-inline-flex align-items-center my-3">
                    <img src="/storage/assets/test.jpg" class="cart-image" alt="">
                    <div class="ml-4">
                        <h2 class="font-weight-bold text-dark">Apex Legend 2</h2>
                        <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.211000</h5>
                    </div>
                </div>
                <hr>

                {{-- 1 cart item --}}
                <div class="d-lg-inline-flex align-items-center my-3">
                    <img src="/storage/assets/test.jpg" class="cart-image" alt="">
                    <div class="ml-4">
                        <h2 class="font-weight-bold text-dark">Apex Legend 2</h2>
                        <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.211000</h5>
                    </div>
                </div>
                <hr>

                {{-- 1 cart item --}}
                <div class="d-lg-inline-flex align-items-center my-3">
                    <img src="/storage/assets/test.jpg" class="cart-image" alt="">
                    <div class="ml-4">
                        <h2 class="font-weight-bold text-dark">Apex Legend 2</h2>
                        <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.211000</h5>
                    </div>
                </div>
                <hr>

                <h4 class="text-dark">Total Price: <span class="font-weight-bold">Rp. 851.000</span></h4>
            </div>
        </div>
    </div>
</div>
@endsection
