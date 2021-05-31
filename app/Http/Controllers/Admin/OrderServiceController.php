<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderService;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderServiceController extends Controller
{
    public function index(){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }
        return view('Admin.orderServices.index')
            ->with('user', $user)
            ;
    }

    public function os(){
        $user = Auth::guard('user')->user();

        if (!$user) {
            return view('Auth.sessionExpired');
        }

         $detentos = User::where('type','DETENTO')->get();
         $servicos = Service::orderBy('id','DESC')->get();
        $clientes = User::where('type','CLIENTE')->get();
        $os = OrderService::get();


        return view('Admin.orderServices.registerOS')
            ->with('user', $user)
            ->with('os', $os)
            ->with('detentos',$detentos)
            ->with('servicos',$servicos)
            ->with('clientes',$clientes);

    }
}
