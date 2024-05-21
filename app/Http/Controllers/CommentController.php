<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Message $message)
    {
        // test
        // dump($request()->all());

        // se non scrivo nulla nella form messaggio errore
        request()->validate([
            "content" => "required|min:2|max:240",
        ]);

        $comment = new Comment();
        $comment->message_id = $message->id;
        $comment->user_id = auth()->user()->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('messages.show', $message->id)->with('success', 'Comment posted successfully!');
    }
}
