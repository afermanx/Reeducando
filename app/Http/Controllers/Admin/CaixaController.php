<?php

namespace App\Http\Controllers\Admin;


use App\CaixaDetento;
use App\CaixaOficina;
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

       $cxDetento =CaixaDetento::sum('valor');
       $cxOficina =CaixaOficina::sum('valor');





       return view('Admin.Financeiro.caixa')
           ->with('user', $user)
           ->with('cxDetento', $cxDetento)
           ->with('cxOficina', $cxOficina);

   }
}
