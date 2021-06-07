<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Detento;
use App\Http\Controllers\Controller;
use App\OrderService;
use App\Service;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderServiceController extends Controller
{
    public function index(){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }


        $ordens = OrderService::join('detento','detento_id','=','detento.id')
            ->join('cliente','cliente_id','=','cliente.id')
            ->join('services','service_id','=','services.id')
            ->get(['order_services.*', 'services.name as Servico','cliente.name as Cliente','detento.name as Detento']);

        return view('Admin.orderServices.index')
            ->with('user', $user)
            ->with('ordens',$ordens);
    }

    public function os(){
        $user = Auth::guard('user')->user();

        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $servicos = Service::orderBy('id','DESC')->get();
        $detentos = Detento::orderBy('id','DESC')->get();
        $clientes = Cliente::orderBy('id','DESC')->get();



        return view('Admin.orderServices.registerOS')
            ->with('user', $user)
            ->with('detentos',$detentos)
            ->with('servicos',$servicos)
            ->with('clientes',$clientes);

    }

    public function salvar(Request $request){

        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');

        }

        try {

            $dados = $request->validate([
                'dataInicio' => 'required',
                'service' => 'required',
                'valor' => 'required',



            ]);

            $data = json_decode($request->getContent(), true);
            $dataInicio = $data['dataInicio'];
            $valor = $data['valor'];
            $service = $data['service'];
            $cliente = $data['cliente'];
            $detento = $data['detento'];

//                pega id do seviço pela descrição
            $servico = Service::where('description',$request->serviceName)->pluck('id')->all();











            $os = new OrderService();
            $os->dataInicio=$dataInicio;
            $os->valor=$valor;
            $os->valorAtual=$valor;
            $os->valorRecebido=0;
            $os->service_id= $servico[0];
            $os->detento_id=$detento;
            $os->cliente_id=$cliente;
            $os->status='AGUARDANDO';

            $os->save();

            return response()->json(['sucesso' => true, 'message' =>' cadastrado com sucesso', 'idOs' => $os->id]);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }

    }


    public function finalizar(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');

        }
        try {


            $data = json_decode($request->getContent(), true);
            $calculo = $data['calculo'];
            $valorRecebido = $data['valorRecebido'];
            $os_id = $data['os_id'];


            $os = OrderService::find($os_id);
            $os->valorAtual=$calculo;
            $os->valorRecebido=$valorRecebido;
            $os->status='FALTA';

            $os->save();

            return response()->json(['sucesso' => true, 'message' =>' cadastrado com sucesso', 'idOs' => $os->id]);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }





    }
    public function destroy(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }



            $data = json_decode($request->getContent(), true);


            $os = $data['os_id'];

            OrderService::where('id',$os)->delete();



            return response()->json(['sucesso' => true, 'excluido' => true]);





    }
}
