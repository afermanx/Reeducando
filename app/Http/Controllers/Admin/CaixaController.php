<?php

namespace App\Http\Controllers\Admin;


use App\CaixaDetento;
use App\CaixaOficina;
use App\Http\Controllers\Controller;
use App\Transacoes;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CaixaController extends Controller
{
   public function index(){
       $user = Auth::guard('user')->user();
       if (!$user) {
           return view('Auth.sessionExpired');
       }

       $cxDetento =CaixaDetento::sum('valor');
       $cxOficina =CaixaOficina::sum('valor');

       $trasacoes=Transacoes::join('detento','detento_id','=','detento.id')
                            ->join('oficinas','oficina_id','=','oficinas.id')
                            ->join('order_services','orderServices_id','=','order_services.id')
                            ->get(['transacoes.*','order_services.valor as valor','order_services.valorRecebido as valorRecebido']);





       return view('Admin.Financeiro.caixa')
           ->with('user', $user)
           ->with('cxDetento', $cxDetento)
           ->with('cxOficina', $cxOficina)
           ->with('transacoes', $trasacoes);

   }

   public function caixaDetento(){
       $user = Auth::guard('user')->user();
       if (!$user) {
           return view('Auth.sessionExpired');
       }
       $cxDetento=CaixaDetento::join('detento','detento.id','=','caixa_detento.detento_id')
           ->get(['caixa_detento.*' ,'detento.name as nameDetento']);

       $response = Http::get('http://127.0.0.1');

        return $response->headers();



   }
}
