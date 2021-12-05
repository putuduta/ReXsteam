<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function checkout()
    {
        return view('pages.checkout', [
            'amount' => Cart::join('games', 'carts.game_id', '=', 'games.id')
                ->where('carts.user_id', auth()->user()->id)
                ->sum('games.price')
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'card_name' => 'string|min:6',
            'card_number' => 'required|integer|digits_between:1,12',
            'expired_month' => 'required|integer|min:1|max:12',
            'expired_year' => 'required|integer|min:2021|max:2025',
            'cvc_cvv' => 'required|integer|digits_between:3,4',
            'card_country' => 'required',
            'postal_code' => 'required|integer'
        ]);

        $transactionHeader = TransactionHeader::create([
            'user_id' => auth()->user()->id,
            'card_name' => $request->input('card_name'),
            'card_number' => $request->input('card_number'),
            'expired_month' => $request->input('expired_month'),
            'expired_year' => $request->input('expired_year'),
            'cvc_cvv' => $request->input('cvc_cvv'),
            'card_country' => $request->input('card_country'),
            'postal_code' => $request->input('postal_code'),
        ]);

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        
        if ($carts) {
            
            foreach ($carts as $cart) {
                TransactionDetail::create([
                    'transaction_id' => $transactionHeader->id,
                    'game_id' => $cart->game_id,
                ]);

                $cart->delete();
            }
        }
            
        return redirect()->route('transactions.receipt', $transactionHeader)->with('success', 'Successfully checkout!');
    }

    public function receipt(TransactionHeader $transactionHeader)
    {
        return view('pages.receipt', [
            'transactionHeader' => $transactionHeader,
            'transactionDetails' => TransactionDetail::where('transaction_id', $transactionHeader->id)->get()
        ]);
    }

    public function history()
    {
        return view('pages.history', [
            'transactionHeaders' => TransactionHeader::where('user_id', auth()->user()->id)->get(),
            'transactionDetails' => TransactionDetail::all(),
        ]);
    }
}
