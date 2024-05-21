<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageLikeController extends Controller
{
    public function like(Message $message){
        $liker = auth()->user();
        $liker->likes()->attach($message);
        return redirect()->route("dashboard")->with("success","Liked succesfully!");
    }
    public function unlike(Message $message){
        $liker = auth()->user();
        $liker->likes()->detach($message);
        return redirect()->route("dashboard")->with("success","Liked succesfully!");
    }
}
