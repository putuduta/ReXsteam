<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manage() {
        return view('pages.manage_game');
    }

    public function create()
    {
        return view('pages.create_game');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request, TRUE);

        if(request()->hasFile('cover')){
            $extension = request()->file('cover')->getClientOriginalExtension();
            $coverFileName = $request->name.'_cover'.'.'.$extension;
            request()->file('cover')->storeAs('public/assets/covers', $coverFileName);
        }else{
            $coverFileName = NULL;
        }

        if (request()->hasFile('trailer')) {
            $extension = request()->file('trailer')->getClientOriginalExtension();
            $trailerName =  $request->name.'_trailer'.'.'.$extension;
            request()->file('trailer')->storeAs('public/assets/trailers', $trailerName);

        } else {
            $trailerName = NULL;
        }
        
        Game::create ([
            'name' => request('name'),
            'description' => request('description'),
            'long_description' => request('long_description'),
            'category' => request('category'),
            'developer' => request('developer'),
            'publisher' => request('publisher'),
            'price' => request('price'),
            'cover' => $coverFileName,
            'trailer' => $trailerName,
            'is_adult' => request('is_adult') == '1' ? TRUE : FALSE
        ]);

        return redirect()->route('home')->with('success','Game Successfully Created!');
    }

    public function edit(Game $game)
    {
        return view('pages.edit_game', [
            'game' => Game::where ('id', $game->id) -> first()
        ]);
    }

    public function update(Request $request, Game $game)
    {
        $this->validateRequest($request, FALSE);

        if ($request -> hasFile('cover_image_new')) {
            $extension = $request->file('cover_image_new')->getClientOriginalExtension();
            $coverFileName = $game->name.'_cover_updated'.time().'.'.$extension;
            request()->file('cover')->storeAs('public/assets/covers', $coverFileName);
        }else {
            $coverFileName = $game->cover;
        }

        if ($request -> hasFile('new_trailer')) {
            $extension = $request->file('new_trailer')->getClientOriginalExtension();
            $trailerFileName = $game->name.'_cover_updated'.time().'.'.$extension;
            request()->file('trailer')->storeAs('public/assets/trailers', $trailerFileName);
        }else {
            $trailerFileName = $game->trailer;
        }

        $game -> update([
            'description' => request('description'),
            'long_description' => request('long_description'),
            'category' => request('category'),
            'price' => request('price'),
            'cover' => $coverFileName,
            'trailer' => $trailerFileName,
        ]);

        return redirect()->route('home')->with('success','Edit Success!');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->back()->with('success', 'Success delete game!');
    }

    // Function for validating request
    public function validateRequest (Request $request, bool $isCreate) {
        $request -> validate([
            'name' => 'string|unique:games',
            'description' => 'required|string|max:500',
            'long_description' => 'required|string|max:2000',
            'category' => 'required|string|max:2000',
            'cover' => 'image|max:100|mimes:jpg',
            'trailer' => 'max:1000000|mimes:webm',
            'price' => 'required|integer|max:1000000|'
        ]);

        if ($isCreate) 
        {
            $request -> validate([
                'name' => 'required',
                'developer' => 'required',
                'publisher' => 'required',
                'cover'=> 'required',
                'trailer'=> 'required'
            ]);
        }else 
        {
            $request -> validate([
                'cover'=> 'nullable',
                'trailer'=> 'nullable'
            ]);
        }
    }
}
