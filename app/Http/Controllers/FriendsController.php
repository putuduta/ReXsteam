<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    public function index()
    {
        $incomingRequests =
            Friendship::with('user')->where('friend_id', auth()->user()->id)->where('is_mutual', false)->get();
        $pendingRequests = Friendship::with('friend')->where('user_id', auth()->user()->id)->where('is_mutual', false)->get();

        $friends = Friendship::with('friend', 'user')
            ->where(function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->where('is_mutual', true);
            })
            ->orWhere(function ($query) {
                $query->where('friend_id', auth()->user()->id)
                    ->where('is_mutual', true);
            })->get();

        return view('pages.friends', compact('incomingRequests', 'pendingRequests', 'friends'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
        ]);

        $existUser = User::where('username', $request->input('username'))
            ->where('username', '!=', auth()->user()->username)
            ->where('role', 'member')
            ->first();

        if (!$existUser) return back()->with('error', 'User does not exist');

        $existFriendship = Friendship::where([['friend_id', $existUser->id], ['user_id', auth()->user()->id]])
            ->orWhere([['user_id', $existUser->id], ['friend_id', auth()->user()->id]])
            ->first();

        if ($existFriendship) return back()->with('error', 'Friend request already exists or you already a friend with this user');

        Friendship::create([
            'friend_id' => $existUser->id,
            'user_id' => auth()->user()->id,
            'is_mutual' => false,
        ]);

        return redirect()->route('friends.index')->with('success', 'Friend request created');
    }

    public function accept(Request $request)
    {
        $existFriendship = Friendship::find($request->id);

        if (!$existFriendship) return back();
        $existFriendship->update(['is_mutual' => true]);

        return redirect()->route('friends.index')->with('success', 'Friend request accepted');
    }

    public function reject(Request $request)
    {
        $existFriendship = Friendship::find($request->id);

        if (!$existFriendship) return back();
        $existFriendship->delete();

        return redirect()->route('friends.index')->with('success', 'Friend request rejected');
    }
}
