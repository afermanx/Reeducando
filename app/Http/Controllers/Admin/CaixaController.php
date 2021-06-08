<?php

namespace App\Http\Controllers\Admin;

use App\Caixa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaController extends Controller
{
   public function index(){
       $user = Auth::guard('user')->user();
       if (!$user) {
           return view('Auth.sessionExpired');
       }

       return view('Admin.Financeiro.caixa')
           ->with('user', $user);

   }
}
