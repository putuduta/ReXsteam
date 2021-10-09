@extends('layouts.app')

@section('content')
<!-- Create Games -->
<section id="">
    <div class="container-fluid redash">
        <h2 class="dash-title">Create Games</h2>
        <div class="card rounded-bottom px-5">
            <div class="card-body">
                <form method="POST" action="{{ action('GameController@create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="name"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left formright">{{_('Game Name')}}</label>
                            <div class="col-sm-12">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="description"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left">{{_('Game Description')}}</label>
                            <div class="col-sm-12">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="long_description"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left">{{_('Game Long Description')}}</label>
                            <div class="col-sm-12">
                                <textarea name="long_description" id="" cols="30" rows="10" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="category"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left">{{_('Game Category')}}</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="category">
                                    <option>Action</option>
                                    <option>Adventure</option>
                                    <option>Horror</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-lg-6  form-group row mb-0 mb-sm-3">
                            <label for="developer"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left">{{_('Developer')}}</label>
                            <div class="col-sm-12">
                                <input type="text" id="developer" name="developer" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6  form-group row mb-0 mb-sm-3">
                            <label for="publisher"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left">{{_('Publisher')}}</label>
                            <div class="col-sm-12">
                                <input type="text" id="publisher" name="publisher" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="price"
                                class="col-lg-6 col-sm-12 col-form-label text-sm-left">{{_('Price')}}</label>
                            <div class="col-sm-12">
                                <input type="number" id="price" name="price" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="cover"
                                class=" col-lg-6 col-sm-6 col-form-label text-sm-left">{{_('Game Cover')}}</label>
                            <div class="trans">
                                <div class=" col-sm-12">
                                    <input type="file" id="cover" name="cover"
                                        class="custom-file-input" value="{{ old('cover') }}">
                                    <label class="trans-cst custom-file-label overflow-hidden"
                                        for="cover">Choose File</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 form-group row mb-0 mb-sm-3">
                            <label for="trailer"
                                class=" col-lg-6 col-sm-6 col-form-label text-sm-left">{{_('Game Trailer')}}</label>
                            <div class="trans">
                                <div class=" col-sm-12">
                                    <input type="file" id="trailer" name="trailer"
                                        class="custom-file-input" value="{{ old('trailer') }}">
                                    <label class="trans-cst custom-file-label overflow-hidden"
                                        for="trailer">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_adult" name="is_adult">
                        <label class="form-check-label" for="exampleCheck1">Only for adult ? </label>
                      </div>
                    <div class="form-group row mb-0 sbtn-left">
                        <div class="subbtn col">
                            <button type="submit" class="btn btn-block btn-dark">
                                {{_('Submit')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection