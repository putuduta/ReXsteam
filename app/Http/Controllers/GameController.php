<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('show');
    }

    public function index()
    {
        return view('pages.games.index', [
            'games' => Game::paginate(8),
            'name' => '',
            'category' => '',
        ]);
    }

    public function filter(Request $request)
    {;
        return view('pages.games.index', [
            'games' => $this->filterQuery($request->name, $request->category),
            'name' => $request->name,
            'category' => $request->category,
        ]);
    }

    private function filterQuery($name, $category)
    {
        if (isset($name) && isset($category)) {
            return Game::where('name', 'LIKE', '%' . $name . '%')
                ->where('category', $category)
                ->paginate(8);
        }

        if (isset($name) && !isset($category))
            return Game::where('name', 'LIKE', '%' . $name . '%')->paginate(8);

        if (!isset($name) && isset($category))
            return Game::where('category', $category)->paginate(8);

        return Game::paginate(8);
    }

    public function create()
    {
        return view('pages.games.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request, TRUE);

        if (request()->hasFile('cover')) {
            $extension = request()->file('cover')->getClientOriginalExtension();
            $coverFileName = $request->name . '_cover_' . time() . '.' . $extension;
            request()->file('cover')->storeAs('public/assets/covers', $coverFileName);
        } else {
            $coverFileName = NULL;
        }

        if (request()->hasFile('trailer')) {
            $extension = request()->file('trailer')->getClientOriginalExtension();
            $trailerName =  $request->name . '_trailer_' . time() . '.' . $extension;
            request()->file('trailer')->storeAs('public/assets/trailers', $trailerName);
        } else {
            $trailerName = NULL;
        }

        Game::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'long_description' => $request->input('long_description'),
            'category' => $request->input('category'),
            'developer' => $request->input('developer'),
            'publisher' => $request->input('publisher'),
            'price' => $request->input('price'),
            'cover' => $coverFileName,
            'trailer' => $trailerName,
            'is_adult' => $request->input('is_adult') ? true : false,
        ]);

        return redirect()->route('games.index')->with('success', 'Game Successfully Created!');
    }

    public function show(Request $request, Game $game)
    {
        if ($game->is_adult) {

            if (!$request->submit) {
                return view('pages.games.filter', compact('game'));
            } else {

                $pass = true;

                if ($request->submit == 'cancel') {
                    $pass = false;
                } else {
                    $this->validate($request, [
                        'day' => 'required|integer|min:1|max:31',
                        'month' => 'required|integer|min:1|max:12',
                        'year' => 'required|integer|min:1900|max:2021',
                    ]);

                    if ($request->year + 17 > date('Y')) {
                        $pass = false;
                    } else if ($request->year + 17 == date('Y') && $request->month < date('m')) {
                        $pass = false;
                    } else if ($request->year + 17 == date('Y') && $request->month == date('m') && $request->day < date('d')) {
                        $pass = false;
                    }
                }

                if (!$pass) {
                    return redirect()->route('home')->with('error', 'There is inappropriate content for the user current age');
                }
            }
        }

        $existGame = TransactionDetail::whereHas('transactionHeader', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('game_id', $game->id)->first();

        $isExist = $existGame ? true : false;

        return view('pages.games.show', compact('game', 'isExist'));
    }


    public function edit(Game $game)
    {
        return view('pages.games.edit', [
            'game' => Game::where('id', $game->id)->first()
        ]);
    }

    public function update(Request $request, Game $game)
    {
        $this->validateRequest($request, FALSE);

        if ($request->hasFile('cover_image_new')) {
            $extension = $request->file('cover_image_new')->getClientOriginalExtension();
            $coverFileName = $game->name . '_cover_' . time() . '.' . $extension;
            request()->file('cover')->storeAs('public/assets/covers', $coverFileName);
        } else {
            $coverFileName = $game->cover;
        }

        if ($request->hasFile('new_trailer')) {
            $extension = $request->file('new_trailer')->getClientOriginalExtension();
            $trailerFileName = $game->name . '_trailer_' . time() . '.' . $extension;
            request()->file('trailer')->storeAs('public/assets/trailers', $trailerFileName);
        } else {
            $trailerFileName = $game->trailer;
        }

        $game->update([
            'description' => $request->input('description'),
            'long_description' => $request->input('long_description'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'cover' => $coverFileName,
            'trailer' => $trailerFileName,
        ]);

        return redirect()->route('games.index')->with('success', 'Edit Success!');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Success delete game!');
    }

    // Function for validating request
    public function validateRequest(Request $request, bool $isCreate)
    {
        $request->validate([
            'name' => 'string|unique:games',
            'description' => 'required|string|max:500',
            'long_description' => 'required|string|max:2000',
            'category' => 'required|string|max:2000',
            'cover' => 'image|max:100|mimes:jpg',
            'trailer' => 'max:100000|mimes:webm',
            'price' => 'required|integer|max:1000000|'
        ]);

        if ($isCreate) {
            $request->validate([
                'name' => 'required',
                'developer' => 'required',
                'publisher' => 'required',
                'cover' => 'required',
                'trailer' => 'required'
            ]);
        } else {
            $request->validate([
                'cover' => 'nullable',
                'trailer' => 'nullable'
            ]);
        }
    }
}
