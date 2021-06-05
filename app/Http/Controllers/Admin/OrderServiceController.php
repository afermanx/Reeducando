<?php

namespace App\Http\Controllers\Admin;

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

        $ordens = OrderService::join('services','id', '=','service_id' )->get();

        return view('Admin.orderServices.index')
            ->with('user', $user)
            ->with('ordens',$ordens);
    }

    public function os(){
        $user = Auth::guard('user')->user();

        if (!$user) {
            return view('Auth.sessionExpired');
        }

         $detentos = User::where('type','DETENTO')->get();
         $servicos = Service::orderBy('id','DESC')->get();
        $clientes = User::where('type','CLIENTE')->get();



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


            $servico = Service::where('description',$request->serviceName)->pluck('id')->all();











            $os = new OrderService();
            $os->dataInicio=$dataInicio;
            $os->valor=$valor;
            $os->valorRecebido=$valor;
            $os->service_id= $servico[0];
            $os->detento_id=$detento;
            $os->cliente_id=$cliente;
            $os->status='ATIVO';

            $os->save();

            return response()->json(['sucesso' => true, 'message' =>' cadastrado com sucesso', 'idOs' => $os->id]);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }

    }
}
