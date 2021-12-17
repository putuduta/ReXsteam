<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function index()
    {
        return view('pages.cart', [
            'carts' => Cart::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store($id)
    {
        Cart::create([
            'game_id' => $id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('home')->with('success', 'Successfully add to cart!');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('games.index')->with('success', 'Success delete cart!');
    }
}
