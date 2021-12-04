@extends('layouts.with-nav-foot')

@section('content')
@section('title', 'Create Game')
<!-- Create Games -->
<section class="main-wrapper" style="padding-top: 2rem;!important">
    <div class="container-fluid">
        <h3 class="title-section pb-2" style="font-size: 32px;!important">Create Games</h3>
        <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 form-group row mb-0 mb-sm-3">
                    <label for="name"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left formright">{{_('Game Name')}}</label>
                    <div class="col-sm-12">
                        <input type="text" @error('name') is-invalid @enderror id="name" name="name"
                            value="{{ old('name') }}" class="form-control" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 form-group row mb-0 mb-sm-3">
                    <label for="description"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Game Description')}}</label>
                    <div class="col-sm-12">
                        <textarea name="description" @error('description') is-invalid @enderror id="description"
                            cols="30" rows="3" class="form-control" required>{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p class="text-muted pt-2">Write a single sentence about the game.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 form-group row mb-0 mb-sm-3">
                    <label for="long_description"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Game Long Description')}}</label>
                    <div class="col-sm-12">
                        <textarea name="long_description" @error('description') is-invalid @enderror
                            id="long_description" cols="30" rows="8" class="form-control"
                            required>{{ old('long_description') }}</textarea>
                        @error('long_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p class="text-muted pt-2">Write a few sentence about the game.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 form-group row mb-0 mb-sm-3">
                    <label for="category"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Game Category')}}</label>
                    <div class="col-sm-12">
                        <select class="form-control" @error('category') is-invalid @enderror id="category"
                            name="category">
                            <option value="Idle" {{ old('category') == 'Idle' ? 'selected' : '' }}>Idle</option>
                            <option value="Horror" {{ old('category') == 'Horror' ? 'selected' : '' }}>Horror</option>
                            <option value="Adventure" {{ old('category') == 'Adventure' ? 'selected' : '' }}>Adventure
                            </option>
                            <option value="Action" {{ old('category') == 'Action' ? 'selected' : '' }}>Action</option>
                            <option value="Sports" {{ old('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Strategy" {{ old('category') == 'Strategy' ? 'selected' : '' }}>Strategy
                            </option>
                            <option value="Role-playing" {{ old('category') == 'Role-playing' ? 'selected' : '' }}>
                                Role-playing
                            </option>
                            <option value="Puzzle" {{ old('category') == 'Puzzle' ? 'selected' : '' }}>
                                Puzzle
                            </option>
                            <option value="Simulation" {{ old('category') == 'Simulation' ? 'selected' : '' }}>
                                Simulation
                            </option>
                        </select>
                        @error('long_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12  form-group row mb-0 mb-sm-3">
                    <label for="developer"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Developer')}}</label>
                    <div class="col-sm-12">
                        <input type="text" id="developer" @error('developer') is-invalid @enderror name="developer"
                            class="form-control" value="{{ old('developer') }}" required>
                        @error('developer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12  form-group row mb-0 mb-sm-3">
                    <label for="publisher"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Publisher')}}</label>
                    <div class="col-sm-12">
                        <input type="text" id="publisher" @error('publisher') is-invalid @enderror name="publisher"
                            class="form-control" value="{{ old('publisher') }}" required>
                        @error('publisher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 form-group row mb-0 mb-sm-3">
                    <label for="price"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Price')}}</label>
                    <div class="col-sm-12">
                        <input type="number" id="price" @error('price') is-invalid @enderror name="price"
                            class="form-control" value="{{ old('price') }}" required>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 form-group row mb-0 mb-sm-3 game_cover">
                    <label for="cover"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Game Cover')}}</label>
                    <div class="col-sm-12">
                        <label class="file">
                            Drag and drop your file or click in this area.
                            <p class="text-muted pt-2">JPG up to 100kb.
                            </p>
                            <input type="file" class="ml-3 mr-5 pr-5 form-control" id="cover" name="cover" required>
                            <p class="info"></p>
                        </label>
                    </div>
                </div>

                <div class="col-lg-12 form-group row mb-0 mb-sm-3 game_cover">
                    <label for="cover"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Game Trailer')}}</label>
                    <div class="col-sm-12">
                        <label class="file">
                            Drag and drop your file or click in this area.
                            <p class="text-muted pt-2">WEBM up to 100mb.
                            </p>
                            <input type="file" class="ml-3 mr-5 pr-5 form-control" id="trailer" name="trailer" required>
                            <p class="info"></p>
                        </label>
                    </div>
                </div>

                <div class="col-lg-12 form-group row mb-0 mb-sm-3 game_cover">
                    <div class="ml-3 form-check">
                        <input type="checkbox" @error('is_adult') is-invalid @enderror class="form-check-input"
                            id="is_adult" name="is_adult" {{ old('is_adult') == '1' ? 'checked' : '' }}>
                        <label class="text-input form-check-label" for="is_adult">Only for adult ? </label>
                        @error('is_adult')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="btn-game">
                <hr>
            </div>

            <div class="d-flex justify-content-end btn-game">
                <a class="btn btn-mb btn-light mr-3" href="/">Cancel</a>
                <button type="submit" class="btn btn-mb btn-dark">
                    {{_('Submit')}}
                </button>
            </div>
        </form>


    </div>
</section>

<script>
    $(document).ready(function () {
        $('input[type=file]').change(function () {
            //console.log(this.files);
            var f = this.files;
            var el = $(this).parent();
            if (f.length > 1) {
                console.log(this.files, 1);
                el.text('Sorry, multiple files are not allowed');
                return;
            }
            // el.removeClass('focus');
            el.append(f[0].name + '<br>' +
                '<span class="sml">' +
                'type: ' + f[0].type + ', ' +
                Math.round(f[0].size / 1024) + ' KB</span>');
            console.log($('#text').val());
        });

        $('input[type=file]').on('focus', function () {
            $(this).parent().addClass('focus');
        });

        $('input[type=file]').on('blur', function () {
            $(this).parent().removeClass('focus');
        });


    });

</script>
@endsection
