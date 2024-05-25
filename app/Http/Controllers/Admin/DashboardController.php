<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        //se non è autorizzato reindirizza verso 403
        // if(!auth()->user()->is_admin){
        //     abort(403);
        // }

        // Log::info("inside admin dashboard controller");

        // connesso a provider/authserviceprovider
        // if (!Gate::allows('admin')) {
        //     abort(403);
        // }
        // metodo alternativo
        // $this->authorize("admin");

        // in alternativa direttamente dal kernel.php in can

        $totalUsers = User::count();
        $totalMessages = Message::count();
        $totalComments = Comment::count();
        return view('admin.dashboard', compact('totalUsers','totalMessages','totalComments'));
    }
}
