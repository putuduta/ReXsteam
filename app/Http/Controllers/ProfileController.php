<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.profile');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'current_password' => 'required|alpha_num|min:6|password',
            'new_password' => 'nullable|required_with:confirm_password|alpha_num|min:6',
            'confirm_password' => 'nullable|required_with:new_password|alpha_num|min:6|same:new_password',
            'profile_picture' => 'nullable|mimes:png,jpg|max:100',
        ]);

        $user = User::find(auth()->user()->id);

        if (request()->hasFile('profile_picture')) {
            $extension = request()->file('profile_picture')->getClientOriginalExtension();
            $fileName = auth()->user()->id . '_' . time() . '.' . $extension;
            request()->file('profile_picture')->storeAs('public/assets/profile', $fileName);
        } else {
            $fileName = $user->profile_picture;
        }

        $user->update([
            'full_name' => $request->input('full_name'),
            'password' => $request->input('new_password') ? Hash::make($request->input('new_password')) : $user->password,
            'profile_picture' => $fileName
        ]);

        return back()->with('success', 'Profile Updated');
    }
}
