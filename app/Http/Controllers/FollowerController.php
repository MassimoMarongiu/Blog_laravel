<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    public function follow(User $user){

        $follower=auth()->user();
        // add manytomany relationship
        // followings dal model/user.php

        $follower->followings()->attach($user);

        return redirect()->route('users.show',$user->id)->with('success','followwed successfully!');
    }

    public function unfollow(User $user){

        $follower=auth()->user();

        // add manytomany relationship
        // followings dal model user.php
        $follower->followings()->detach($user);

        return redirect()->route('users.show',$user->id)->with('success','unfollowed successfully!');
    }
}
