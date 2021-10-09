<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function manage() {
        return view('game.manage_game')
    }

    public function create()
    {
        return view('game.create_game');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request, TRUE);

        if($request->hasFile('cover')){
            $extension = $request->file('cover')->getClientOriginalExtension();
            $coverFileName = $request->name.'_cover'.'.'.$extension;
            $request->file('cover')->storeAs('public/images/covers/',$coverFileName);
        }else{
            $coverFileName = NULL;
        }

        if ($request->hasFile('qr_code')) {
            $extension = $request->file('trailer')->getClientOriginalExtension();
            $trailer =  $request->name.'_trailer'.'.'.$extension;
            $request->file('trailer')->storeAs('public/videos/trailers/',$trailer);
        } else {
            $trailer = NULL;
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
            'trailer' => $trailer,
            'is_adult' => request('is_adult'),
        ]);

        return redirect()->route('game.manage')->with('success','Game Successfully Created!');
    }

    public function edit(Game $game)
    {
        return view ('game.edit_game', [
            'game' => Game::where ('id', $game->id) -> first()
        ]);
    }

    public function update(Request $request, Game $game)
    {
        $this->validateRequest($request, FALSE);

        if ($request -> hasFile('cover_image_new')) {
            $extension = $request->file('cover_image_new')->getClientOriginalExtension();
            $coverFileName = $game->name.'_cover_updated'.time().'.'.$extension;
            $request->file('cover_image_new')->storeAs('public/images/covers/',$coverFileName);
        }else {
            $coverFileName = request('cover_image_old');
        }

        if ($request -> hasFile('new_trailer')) {
            $extension = $request->file('new_trailer')->getClientOriginalExtension();
            $trailerFileName = $game->name.'_cover_updated'.time().'.'.$extension;
            $request->file('new_trailer')->storeAs('public/videos/trailers/',$trailerFileName);
        }else {
            $trailerFileName = request('trailer_old');
        }

        $game -> update([
            'description' => request('description'),
            'long_description' => request('long_description'),
            'category' => request('category'),
            'price' => request('price'),
            'cover' => $coverFileName,
            'trailer' => $trailerFileName,
        ]);

        return redirect()->route('game.manage')->with('success','Edit Success!');
    }

    // Function for validating request
    public function validateRequest (Request $request, bool $isCreate) {
        $request -> validate([
            'name' => 'required|string|unique:games',
            'description' => 'required|string|max:500',
            'long_description' => 'required|string|max:2000',
            'category' => 'required|string|max:2000',
            'cover' => 'image|max:99|mimes:jpg',
            'trailer' => 'max:99999|mimes:webm',
            'price' => 'required|integer|max:1000000|'
        ]);

        if ($isCreate) 
        {
            $request -> validate([
                'developer' => 'required',
                'publisher' => 'required',
                'cover'=> 'required',
                'trailer'=> 'required',
                'is_adult' => 'required'
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
