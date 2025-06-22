<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user, Request $request)
    {
        // Logic to follow a user
      $user->followers()->attach(auth()->user()->id);

        return back()->with('success', 'You are now following ' . $user->username);
    }
    public function destroy( User $user, Request $request)
    {
        // Logic to unfollow a user
        $user->followers()->detach(auth()->user()->id);

        return back()->with('success', 'You have unfollowed ' . $user->username);
    }

}
