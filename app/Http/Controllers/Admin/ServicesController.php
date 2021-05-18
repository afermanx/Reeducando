<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::guard('user')->user();

        $data = new Service();
        $services= $data->list();

        return view('Admin.Services.index')
            ->with('user', $user)
            ->with('services', $services);
    }



    public function store(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');


        }

        try {

            $dados = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'value' => 'required',



            ]);

            $data = json_decode($request->getContent(), true);
            $name = $data['name'];
            $description = $data['description'];
            $value = $data['value'];
            $detainee = $data['detainee'];
            $detainee = $data['workshop'];









            $service = new Service();
            $service->name=$name;
            $service->description=$description;
            $service->value=$value;
            $service->detainee=$detainee;
            $service->workshop=$detainee;

            $service->save();

            return response()->json(['sucesso' => true, 'message' => $service->name.' cadastrado com sucesso', 'idRegister' => $service->id]);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }


    }


    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $data = json_decode($request->getContent(), true);


        $service = $data['service_id'];

        Service::where('id',$service)->delete();



        return response()->json(['sucesso' => true, 'excluido' => true]);
    }
}
