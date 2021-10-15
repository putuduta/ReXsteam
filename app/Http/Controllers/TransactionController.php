<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function receipt()
    {
        return view('pages.receipt');
    }

    public function history()
    {
        return view('pages.history');
    }
}
