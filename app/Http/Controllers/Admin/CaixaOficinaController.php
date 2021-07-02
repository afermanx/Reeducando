<?php

namespace App\Http\Controllers\Admin;


use App\Detento;
use App\Http\Controllers\Controller;
use App\Oficina;
use App\OficinaTransacao;
use App\Transacoes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaOficinaController extends Controller
{
    public function index(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $idOficina=$request->id;



        $cxOficina= Oficina::where('id', $idOficina)->first();

        $oficinaRetiradas=OficinaTransacao::where('oficina_id',$idOficina)->where('status', 'RETIRADA')->get();

        return view('Admin.Financeiro.CaixaOficina.retirada')
            ->with('user', $user)
            ->with('cxOficina', $cxOficina)
            ->with('oficinaRetiradas',$oficinaRetiradas);
    }
    public function retirar(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $data = json_decode($request->getContent(), true);
        $valor = $data['valor'];
        $oficina_id = $data['oficina_id'];
        $description = $data['description'];

        try {

            $oficina = Oficina::find($oficina_id);
            $oficina->valor = $oficina->valor-$valor;
            $oficina->save();

            $transacao= new OficinaTransacao();
            $transacao->oficina_id = 1;
            $transacao->valor=$valor;
            $transacao->description=$description;
            $transacao->status="RETIRADA";

            $transacao->save();



            return response()->json(['sucesso' => true, 'message' =>' Retirada feita com sucesso']);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }


    }

}
