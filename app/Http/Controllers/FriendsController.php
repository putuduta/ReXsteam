<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incomingRequests =
            Friendship::with('user')->where('friend_id', auth()->user()->id)->where('is_mutual', false)->get();
        $pendingRequests = Friendship::with('friend')->where('user_id', auth()->user()->id)->where('is_mutual', false)->get();

        $friendsFromUser =
            Friendship::with('friend')->where('user_id', auth()->user()->id)->where('is_mutual', true)->get();
        $friendsFromFriend =
            Friendship::with('user')->where('friend_id', auth()->user()->id)->where('is_mutual', true)->get();

        return view('pages.friends', compact('incomingRequests', 'pendingRequests', 'friendsFromUser', 'friendsFromFriend'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
        ]);

        $existUser = User::where('username', $request->input('username'))
            ->where('username', '!=', auth()->user()->username)
            ->first();

        if (!$existUser) return back();

        $existFriendship = Friendship::where([['friend_id', $existUser->id], ['user_id', auth()->user()->id]])
            ->orWhere([['user_id', auth()->user()->id], ['friend_id', $existUser->id]])
            ->first();

        if ($existFriendship) return back();

        Friendship::create([
            'friend_id' => $existUser->id,
            'user_id' => auth()->user()->id,
            'is_mutual' => false,
        ]);

        return redirect()->route('friends.index');
    }

    public function accept(Request $request)
    {
        $existFriendship = Friendship::find($request->id);

        if (!$existFriendship) return back();
        $existFriendship->update(['is_mutual' => true]);

        return redirect()->route('friends.index');
    }

    public function reject(Request $request)
    {
        $existFriendship = Friendship::find($request->id);

        if (!$existFriendship) return back();
        $existFriendship->delete();

        return redirect()->route('friends.index');
    }
}
