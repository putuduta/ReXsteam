@extends('layouts.app')

@section('content')
@include('include.navbar')
<!-- Create Games -->
<section class="main-wrapper" style="padding-top: 2rem;!important">
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Action</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $game->name }}</li>
            </ol>
        </nav>
       

        <h3 class="title-section pb-2" style="font-size: 32px;!important">Update Games</h3>
        <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 form-group row mb-0 mb-sm-3">
                    <label for="description"
                        class="text-input col-lg-12 col-sm-12 col-form-label text-sm-left">{{_('Game Description')}}</label>
                    <div class="col-sm-12">
                        <textarea name="description" @error('description') is-invalid @enderror id="description"
                            cols="30" rows="3" class="form-control" required>{{ $game->description }}</textarea>
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
                            required>{{ $game->long_description }}</textarea>
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
                            <option value="Action" {{ $game->category == 'Action' ? 'selected' : '' }}>Action</option>
                            <option value="Adventure" {{ $game->category == 'Adventure' ? 'selected' : '' }}>Adventure
                            </option>
                            <option value="Horror" {{ $game->category == 'Horror' ? 'selected' : '' }}>Horror</option>
                        </select>
                        @error('long_description')
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
                            class="form-control" value="{{ $game->price }}" required>
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
                            <input type="file" class="ml-3 mr-5 pr-5 form-control" id="cover" name="cover">
                            <!-- use multiple, even if it’s not allowed, to be able to show an info text -->
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
                            <input type="file" class="ml-3 mr-5 pr-5 form-control" id="trailer" name="trailer">
                            <!-- use multiple, even if it’s not allowed, to be able to show an info text -->
                            <p class="info"></p>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="btn-game">
                <hr>
            </div>

            @method('PUT')
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
    $(document).ready(function() {
		$('input[type=file]').change(function() {
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

		$('input[type=file]').on('focus', function() {
				$(this).parent().addClass('focus');
		});

		$('input[type=file]').on('blur', function() {
				$(this).parent().removeClass('focus');
		});

        
});
</script>

@include('include.footer')
@endsection