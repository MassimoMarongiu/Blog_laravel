<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {

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
        return view('admin.dashboard');
    }
}
