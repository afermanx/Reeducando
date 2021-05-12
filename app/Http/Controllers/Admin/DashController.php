<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }


        if($user->status==="Bloqueado"){
            return view('Auth.notAuthorized');
        };

        return view('Admin.Dash')
            ->with('user',$user);
    }
}
