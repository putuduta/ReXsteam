<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'games' => $this->game(false, null),
            'isSearch' => false,
        ]);
    }

    public function search(Request $request)
    {
        return view('pages.home', [
            'games' => $this->game(true, $request),
            'isSearch' => true,
            'keyword' => $request->search_value
        ]);
    }

    private function game($isSearch, $request)
    {
        if ($isSearch) {
            return Game::where('name', 'LIKE', '%' . $request->search_value . '%')
                ->orWhere('category', 'LIKE', '%' . $request->search_value . '%')
                ->paginate(8);
        } else {
            return Game::count() > 8 ? Game::all()->random(8) : Game::all();
        }
    }
}
