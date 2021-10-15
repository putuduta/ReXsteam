@extends('layouts.with-nav-foot')

@section('content')
@section('title', 'Game Detail - Age Check')
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="border border-dark p-lg-5 p-3">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 text-center">
                    <img src="/storage/assets/covers/{{ $game->cover }}" alt="">
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 col-md-8">
                    <h3 class="text-center">CONTENT IN THIS PRODUCT MAY NOT BE APPROPRIATE FOR ALL AGES, OR MAY NOT BE
                        APPROPRIATE FOR
                        VIEWING AT WORK</h3>
                    <form action="{{ route('games.show', $game) }}" method="GET">
                        @csrf
                        <div class="card border-0 shadow bg-muted mt-4">
                            <div class="card-body my-3">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <h5 class="text-center">Please enter your birth date to continue:</h5>
                                        <div class="d-flex justify-content-center">
                                            <div class="my-2">
                                                <label for="day">Day</label>
                                                <br>
                                                <select name="day" id="day" class="form-control">
                                                    @for ($i =1 ;$i<= 31;$i++) <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="my-2 ml-2">
                                                <label for="month">Month</label>
                                                <br>
                                                <select name="month" id="month" class="form-control">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="my-2 ml-2">
                                                <label for="day">Year</label>
                                                <br>
                                                <select name="year" id="year" class="form-control">
                                                    @for ($i =2021 ;$i>= 1900;$i--) <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" value="view" name="submit" class="btn btn-dark">View Page</button>
                            <button type="submit" value="cancel" name="submit"
                                class="btn bg-white border border-dark ml-3">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
