@extends('layouts.with-nav-foot')

@section('title', 'Transaction Information')
@section('content')
<div class="main-wrapper">
    <div class="container-fluid">
        @include('include.transaction-nav')
        <h1 class="title-section my-5">Transaction Information</h1>

        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="my-3">
                <label for="card_name" class="text-dark font-weight-bold">Card
                    Name</label>
                <input placeholder="Card Name" type="text" class="form-control @error('card_name') is-invalid @enderror"
                    name="card_name" id="card_name" value="{{ old('card_name') }}">
                @error('card_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="my-3">
                <label for="card_number" class="text-dark font-weight-bold">Card Number</label>
                <input type="text" placeholder="0000 0000 0000 0000"
                    class="form-control @error('card_number') is-invalid @enderror" name="card_number" id="card_number"
                    value="{{ old('card_number') }}">
                @error('card_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <small class="text-muted">VISA or Master Card</small>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="my-3">
                        <label for="expired_month" class="text-dark font-weight-bold ">Expired Date</label>
                        <input placeholder="MM" type="text"
                            class="form-control @error('expired_month') is-invalid @enderror" name="expired_month"
                            id="expired_month" value="{{ old('expired_month') }}">
                        @error('expired_month')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="my-3">
                        <label for="expired_year">&nbsp;</label>
                        <input placeholder="YYYY" type="text"
                            class="form-control @error('expired_year') is-invalid @enderror" name="expired_year"
                            id="expired_year" value="{{ old('expired_year') }}">
                        @error('expired_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="my-3">
                        <label for="cvc_cvv">CVC / CVV</label>
                        <input placeholder="3 or 4 digit number" type="text"
                            class="form-control @error('cvc_cvv') is-invalid @enderror" name="cvc_cvv" id="cvc_cvv"
                            value="{{ old('cvc_cvv') }}">
                        @error('cvc_cvv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="my-3">
                        <label for="card_country">Country</label>
                        <select name="card_country" id="card_country"
                            class="form-control @error('card_country') is-invalid @enderror">
                            <option value="Indonesia" {{ old('card_country') == 'Indonesia' ? 'selected' : '' }}>
                                Indonesia</option>
                            <option value="Singapore" {{ old('card_country') == 'Singapore' ? 'selected' : '' }}>
                                Singapore</option>
                            <option value="Malaysia" {{ old('card_country') == 'Malaysia' ? 'selected' : '' }}>Malaysia
                            </option>
                        </select>
                        @error('card_country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="my-3">
                        <label for="postal_code">ZIP</label>
                        <input placeholder="ZIP" type="text"
                            class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                            id="postal_code" value="{{ old('postal_code') }}">
                        @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <h4 class="text-dark">Total Price: <span class="font-weight-bold">Rp. {{ $amount }}</span></h4>
                <div class="d-flex">
                    <a href="{{ route('cart.index') }}" class="btn bg-white text-dark">Cancel</a>
                    <button class="btn btn-secondary ml-3" type="submit">
                        <h5 class="text-white my-1"><i class="fa fa-truck"></i> Checkout</h5>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
