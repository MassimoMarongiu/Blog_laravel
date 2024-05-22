<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use App\Models\Message;
use Illuminate\Contracts\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $user = auth()->user();
        // following metodo in model/user.php

        //vedere i commenti delle persone seguite
        $followingIDs = auth()->user()->followings()->pluck('user_id');

        // dd($followingIDs);

        $messages= Message::whereIn('user_id',$followingIDs)->latest();
        // $messages= Message::orderBy('created_at','DESC');

        if(request()->has('search')){
            $messages = $messages->where('content','like','%'.request()->get('search','').'%');
        }

        // Comment::where('message_id',12)->get();

        return view("dashboard",[
            'messages'=>$messages->paginate(5),
        ]);
    }
}
