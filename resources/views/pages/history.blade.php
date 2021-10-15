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

                        {{-- 1 transaction --}}
                        <div class="my-4">
                            <h5>Transaction ID: lakdsjasldkjsalkdjsa</h5>
                            <h5>Purchased Date: 21-05-2021 08:11:11</h5>

                            {{-- 1 transaction --}}
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                            </div>
                            <h5 class="mt-3">Total Price: <span class="font-weight-bold">Rp. 851.000</span></h5>
                            <hr>
                        </div>

                        {{-- 1 transaction --}}
                        <div class="my-4">
                            <h5>Transaction ID: lakdsjasldkjsalkdjsa</h5>
                            <h5>Purchased Date: 21-05-2021 08:11:11</h5>

                            {{-- 1 transaction --}}
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                            </div>
                            <h5 class="mt-3">Total Price: <span class="font-weight-bold">Rp. 851.000</span></h5>
                            <hr>
                        </div>

                        {{-- 1 transaction --}}
                        <div class="my-4">
                            <h5>Transaction ID: lakdsjasldkjsalkdjsa</h5>
                            <h5>Purchased Date: 21-05-2021 08:11:11</h5>

                            {{-- 1 transaction --}}
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <img src="/storage/assets/test.jpg" class="w-100" alt="">
                                </div>
                            </div>
                            <h5 class="mt-3">Total Price: <span class="font-weight-bold">Rp. 851.000</span></h5>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
