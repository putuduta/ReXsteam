<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function index()
    {
        $cartGames = new Collection();
        $cartCookie = Cookie::get('cart');

        if ($cartCookie) {
            $cartArray = explode(";", $cartCookie);

            foreach ($cartArray as $cart) {
                $game = Game::find($cart);
                $cartGames->push($game);
            }
        }

        return view('pages.cart', [
            'cartGames' => $cartGames,
        ]);
    }

    public function store($id)
    {
        $selectedGame = Game::find($id);
        if ($selectedGame) {

            $newCartCookie = Cookie::get('cart');

            if ($newCartCookie == null) $newCartCookie = $id;
            else {
                $cartArray = explode(";", $newCartCookie);

                foreach ($cartArray as $cart) {
                    if ($cart == $id) {
                        return back()->with('error', 'This game already in your cart');
                    }
                }
                $newCartCookie .= ";" . $id;
            }
            Cookie::queue('cart', $newCartCookie, 120);
            return redirect()->route('home')->with('success', 'Successfully add game to cart!');
        } else {
            return back()->with('error', 'Game Not Found');
        }
    }

    public function destroy($id)
    {
        $cartCookie = Cookie::get('cart');
        $newCartCookie = "";
        $cartArray = explode(";", $cartCookie);

        foreach ($cartArray as $cart) {
            if ($cart != $id) $newCartCookie .= $cart;
        }

        if ($newCartCookie == "") Cookie::queue(Cookie::forget('cart'));
        else Cookie::queue('cart', $newCartCookie, 120);

        return redirect()->back()->with('success', 'Success delete game in the cart!');
    }
}
