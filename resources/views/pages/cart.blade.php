@extends('layouts.with-nav-foot')

@section('title', 'Cart')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        @include('include.transaction-nav')
        <h1 class="title-section mt-5 mb-4">Shopping Cart</h1>
        <div class="card">
            <div class="card-body my-3">

                {{-- 1 cart item --}}
                <div class="d-lg-flex justify-content-between align-items-center my-3">
                    <div class="d-lg-flex align-items-center">
                        <img src="/storage/assets/test.jpg" class="cart-image" alt="">
                        <div class="ml-4">
                            <h2 class="font-weight-bold"><span class="text-dark">Apex Legend 2</span><span
                                    class="btn btn-dark text-white ml-2 rounded-pill">Simulation</span></h2>
                            <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.211000</h5>
                        </div>
                    </div>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#confirm-delete">
                        <h5 class="text-white my-1"><i class="fa fa-trash"></i> Delete</h5>
                    </button>
                </div>
                <hr>

                {{-- 1 cart item --}}
                <div class="d-lg-flex justify-content-between align-items-center my-3">
                    <div class="d-lg-flex align-items-center">
                        <img src="/storage/assets/test.jpg" class="cart-image" alt="">
                        <div class="ml-4">
                            <h2 class="font-weight-bold"><span class="text-dark">Apex Legend 2</span><span
                                    class="btn btn-dark text-white ml-2 rounded-pill">Simulation</span></h2>
                            <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.211000</h5>
                        </div>
                    </div>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#confirm-delete">
                        <h5 class="text-white my-1"><i class="fa fa-trash"></i> Delete</h5>
                    </button>
                </div>
                <hr>

                {{-- 1 cart item --}}
                <div class="d-lg-flex justify-content-between align-items-center my-3">
                    <div class="d-lg-flex align-items-center">
                        <img src="/storage/assets/test.jpg" class="cart-image" alt="">
                        <div class="ml-4">
                            <h2 class="font-weight-bold"><span class="text-dark">Apex Legend 2</span><span
                                    class="btn btn-dark text-white ml-2 rounded-pill">Simulation</span></h2>
                            <h5 class="text-muted m-0 mt-3"><i class="fa fa-tag fa-2x"></i> Rp.211000</h5>
                        </div>
                    </div>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#confirm-delete">
                        <h5 class="text-white my-1"><i class="fa fa-trash"></i> Delete</h5>
                    </button>
                </div>
                <hr>
                <h4 class="text-dark my-4">Total Price: <span class="font-weight-bold">Rp.980.000</span></h4>
                <a class="btn btn-secondary" href="{{ route('transactions.checkout') }}">
                    <h5 class="text-white my-1"><i class="fa fa-truck"></i> Checkout</h5>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-delete">Delete Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this game from your shopping cart? All your data will be permanently
                removed. This action cannot be undone
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border bg-white text-dark" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection
