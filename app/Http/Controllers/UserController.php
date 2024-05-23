<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function show(User $user)
    {
        $messages = $user->messages()->paginate(5);

        return view('users.show', compact('user', 'messages'));
    }

    public function edit(User $user)
    {
        // per non fare entrare in edit gli altri user
        $this ->authorize('update', $user);  
        $editing = true;
        $messages = $user->messages()->paginate(5);
        return view("users.edit", compact('user', 'editing', 'messages'));
    }


    public function update(UpdateUserRequest $request,User $user)
    {
        // modificato da Request\UpdateUserRequest

        $this ->authorize('update', $user);

        $validated =$request->validated();
        // $validated = request()->validate(
        //     [
        //         'name' => 'nullable|min:3|max:40',
        //         'bio' => 'nullable|min:2|max:255',
        //         'image' => 'image'
        //     ]
        // );
        // dd($validated);

        if ($request->has('image')) {
            // if (request()->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            // $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            // per cancellare l'immagine da storage dopo che viene uploadata
            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
