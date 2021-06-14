<?php

namespace App\Http\Controllers\Admin;

use App\Detento;
use App\Http\Controllers\Controller;
use App\Transacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaDetentoController extends Controller
{
    public function index(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $cxDetentos=Detento::get();







        return view('Admin.Financeiro.CaixaDetento.caixa')
            ->with('user', $user)
            ->with('cxDetentos', $cxDetentos);



    }
    public function retirada(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $idDetento=$request->id;



        $cxDetento= Detento::where('id', $idDetento)->first();

        $detentoRetiradas=Transacoes::where('detento_id',$idDetento)->where('description', 'RETIRADA')->get();





        return view('Admin.Financeiro.CaixaDetento.retirada')
            ->with('user', $user)
            ->with('cxDetento', $cxDetento)
            ->with('detentoRetiradas',$detentoRetiradas);

    }

    public function retirar(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $data = json_decode($request->getContent(), true);
        $valor = $data['valor'];
        $detento_id = $data['detento_id'];

        try {



            $detento = Detento::find($detento_id);
            $detento->valor = $detento->valor-$valor;
            $detento->save();

            $transacao= new Transacoes();
            $transacao->detento_id=$detento_id;
            $transacao->oficina_id = 1;
            $transacao->valor=$valor;
            $transacao->description="RETIRADA";
            $transacao->status="DOWN";

            $transacao->save();



            return response()->json(['sucesso' => true, 'message' =>' Retirada feita com sucesso']);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }


    }


    public function recibo(){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }
        return view('Admin.Financeiro.CaixaDetento.recibo')->with('user', $user);

    }
}
