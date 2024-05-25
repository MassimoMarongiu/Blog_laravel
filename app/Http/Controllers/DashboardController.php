<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Message;
use App\Mail\WelcomeEmail;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {

        // return new WelcomeEmail(auth()->user());
        // var_dump(Message::all());
        // dump(Message::all());

        // $messages = Message::withCount('likes')->orderBy('created_at', 'DESC');
        // $comment = Comment::orderBy('created_at', 'DESC');

        // if (request()->has('search')) {

            // $messages = $messages->where('content', 'like', '%' . request()->get('search', '') . '%');
            // $messages = $messages->search(request('search',''));
            // $comment = $comment->search(request('search',''));
        // }
        $messages= Message::when(request()->has('search'), function ($query) {
            // connettendolo con il model message
            $query->search(request('search',''));
        })->orderBy('created_at', 'DESC')->paginate(5);

        // Comment::where('message_id',12)->get();

        return view("dashboard", [
            'messages' => $messages,
            // 'messages' => $messages->paginate(5),
        ]);
    }
}
