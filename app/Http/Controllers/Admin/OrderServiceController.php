<?php

namespace App\Http\Controllers\Admin;

use App\CaixaDetento;
use App\CaixaOficina;
use App\Cliente;
use App\Detento;
use App\Http\Controllers\Controller;
use App\Oficina;
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
            ->get(['order_services.*', 'services.name as Servico','cliente.name as Cliente',
                    'detento.name as Detento', 'detento.id as detento_id', 'services.id as service_id']);

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

        $data = json_decode($request->getContent(), true);
        $calculo = $data['calculo'];
        $valorRecebido = $data['valorRecebido'];
        $tipo = $data['tipo'];
        $detento_id = $data['detento_id'];
        $service_id = $data['service_id'];
        $os_id = $data['os_id'];

        $servico = Service::where('id',$service_id)->pluck('detainee')->all();
        $oficina = Service::where('id',$service_id)->pluck('workshop')->all();
        $oficina_id = Oficina::where('id',1)->pluck('id')->all();




        if(!$tipo){

            try {



                $os = OrderService::find($os_id);
                $os->valorAtual=$calculo;
                $os->valorRecebido=$valorRecebido;
                $os->status='FALTA';
                $os->save();

                $percentDetento= $calculo / 100 * $servico[0];



                $cxDetento= new CaixaDetento();
                $cxDetento->detento_id=$detento_id;
                $cxDetento->valor=$percentDetento;

                $cxDetento->save();


                $percentOficina= $calculo / 100 * $oficina[0];



                $cxDetento= new CaixaOficina();
                $cxDetento->oficina_id=$oficina_id[0];
                $cxDetento->valor=$percentOficina;

                $cxDetento->save();



                return response()->json(['sucesso' => true, 'message' =>' cadastrado com sucesso', 'idOs' => $os->id]);


            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
            }


        }
        if($tipo==="quitado"){

            try {





                $os = OrderService::find($os_id);
                $os->valorAtual=$calculo;
                $os->valorRecebido=$valorRecebido;
                $os->status='FINALIZADO';

                $os->save();

                $percentDetento= $valorRecebido / 100 * $servico[0];



                $cxDetento= new CaixaDetento();
                $cxDetento->detento_id=$detento_id;
                $cxDetento->valor=$percentDetento;

                $cxDetento->save();

                $percentOficina= $valorRecebido / 100 * $oficina[0];



                $cxDetento= new CaixaOficina();
                $cxDetento->oficina_id=$oficina_id[0];
                $cxDetento->valor=$percentOficina;

                $cxDetento->save();

                return response()->json(['sucesso' => true, 'message' =>' cadastrado com sucesso', 'idOs' => $os->id]);


            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
            }


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
