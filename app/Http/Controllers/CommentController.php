<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Message;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Message $message)
    {
        // test
        // dump($request()->all());

        // se non scrivo nulla nella form messaggio errore
        // cambiato da createcommentRequest

        // $validated = $request->validated();

        request()->validate([
            "content" => "required|min:2|max:240",
        ]);

        // $validated['user_id'] = auth()->id();
        // $validated['message_id'] = $message->id;

        // Comment::create($validated);

        $comment = new Comment();
        $comment->message_id = $message->id;
        $comment->user_id = auth()->user()->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('messages.show', $message->id)->with('success', 'Comment posted successfully!');
    }
}
