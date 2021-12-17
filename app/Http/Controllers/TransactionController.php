<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Rules\CardNumberFormat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    protected function getAllCartGames()
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

        return $cartGames;
    }

    public function checkout()
    {
        $cartGames = $this->getAllCartGames();
        if (count($cartGames) > 0) {
            return view('pages.checkout', [
                'amount' => $cartGames->sum('price')
            ]);
        } else {
            return back()->with('error', 'No games in the cart. Cannot checkout');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'card_name' => 'string|min:6',
            'card_number' => ['required', 'string', new CardNumberFormat],
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

        $cartGames = $this->getAllCartGames();

        if ($cartGames) {
            foreach ($cartGames as $cartGame) {
                TransactionDetail::create([
                    'transaction_id' => $transactionHeader->id,
                    'game_id' => $cartGame->id,
                ]);
            }
            Cookie::queue(Cookie::forget('cart'));
            return redirect()->route('transactions.receipt', $transactionHeader)->with('success', 'Successfully checkout!');
        } else {
            return back()->with('error', 'No games in cart. Please buy minimal one games');
        }
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
