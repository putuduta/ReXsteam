<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->except('logout');
    }

    public function viewRegister()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'min:6', 'unique:users'],
            'full_name' => ['required'],
            'password' => ['required', 'min:6', 'alpha_num'],
            'role' => ['required', 'in:member,admin'],
        ]);

        User::create([
            'username' => $request->input('username'),
            'full_name' => $request->input('full_name'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect('/')->with('success', 'New Account registered. You can login with your registered account');
    }

    public function viewLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember') ? true : false;

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            if ($remember) {
                $key = Auth::getRecallerName();
                $value = Auth::user()->getRememberToken();
                Cookie::queue($key, $value, 1);
            }
            return redirect('/')->with('success', 'Login success');
        } else {
            return redirect('/')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));
        Cookie::queue(Cookie::forget('cart'));
        return redirect('/')->with('success', 'Logout Success');
    }
}
