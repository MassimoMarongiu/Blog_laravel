<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function show(Message $message)
    {

        // dd($message->comments);

        return view("messages.show", compact('message'));
        // è lo stesso di
        // return view("messages.show",[
        //     'message'=>$message
        // ]);
    }
    public function edit(Message $message)
    {
        // if (auth()->id() != $message->user_id) {
        //     abort(404, "");
        // }
        $this->authorize('update', $message); //cambiato da policies/messagePolicy
        // $this->authorize('message.edit',$message);

        $editing1 = true;

        return view("messages.show", compact('message', 'editing1'));
    }

    public function update(UpdateMessageRequest $request,Message $message)
    {
        //cambiato da policies/messagePolicy
        $this->authorize('update', $message);
        // $this->authorize('message.edit',$message);

        // cambiato da updatemessageRequest
        $validated = $request->validated();
        // $validated = request()->validate([
        //     'content' => 'required|min:2|max:240',
        // ]);
        $message->update($validated);
        // $message ->content= request()->get('content','');
        // $message->save();
        return redirect()->route('messages.show', $message->id)->with('success', 'Message update successfully!');
    }

    public function store(CreateMessageRequest $request)
    // public function store()
    {
        //    dump(request());
        // dump(request()->get('message',''));

        // se non scrivo nulla nella form messaggio errore

        // cambiato da createmessageRequest

        $validated=$request->validated();
        // $validated = request()->validate([
        //     "content" => "required|min:2|max:240",
        // ]);

        $validated['user_id'] = auth()->user()->id;

        Message::create($validated);
        // $message =Message::create(
        //     [
        //         'content'=>request()->get('content',''),
        //     ]
        // );
        // $message->save();

        return redirect()->route('dashboard')->with('success', 'Message create successfully!');
    }

    public function destroy(Message $message)
    {
        // if (auth()->id() != $message->user_id) {
        //     abort(404, "");
        // }

        $this->authorize('delete', $message); //cambiato da policies/messagePolicy
        // $this->authorize('message.delete',$message);

        $message->delete();

        return redirect()->route('dashboard')->with('success', 'Message deleted successfully!');
    }
    // public function destroy($id){
    //     Message::where('id', $id)->firstOrFail()->delete();
    //     return redirect()->route('dashboard')->with('success','Message deleted successfully!');

    // }
}
