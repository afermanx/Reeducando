<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Detento;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::guard('user')->user();
        if (!$user) {
           return view('Auth.sessionExpired');
        }


        $users = new User();
        $data= $users->list();


        return view('Admin.Users.index')
            ->with('user', $user)
            ->with('users',$data);
    }

    public function detentos(){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }


        $users = new Detento();
        $data= $users->list();


        return view('Admin.Detentos.index')
            ->with('user', $user)
            ->with('users',$data);
    }


    public function perfil(){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }
        return view('Admin.Users.perfil')
            ->with('user', $user);
    }


    public function store(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');


        }

        try {

            $dados = $request->validate([
                'name' => 'required',




            ]);

            $data = json_decode($request->getContent(), true);
            $name = $data['name'];
            $email = $data['email'];
            $cpf = $data['cpf'];
            $type = $data['type'];
            $password = $data['password'];
            $status = $data['status'];



            $userCheck=User::where('cpf',$cpf)->get();




            if($userCheck===$cpf){
                return response()->json(['sucesso'=>false,'message'=>'O Usuario com o cpf ' .$cpf. ' ja esta cadastrado']);
            }
            $passCrypt = Hash::make($password);

            if($type==="CLIENTE"){


                $user = new Cliente();
                $user->name=$name;
                $user->email=$email;
                $user->cpf=$cpf;
                $user->password=$passCrypt;
                $user->type=$type;
                $user->status=$status;

                $user->save();

                return response()->json(['sucesso' => true, 'message' => 'Usuario cadastrado com sucesso', 'idRegister' => $user->id]);

            }
            if($type==="DETENTO"){


                $user = new Detento();
                $user->name=$name;
                $user->email=$email;
                $user->cpf=$cpf;
                $user->password=$passCrypt;
                $user->type=$type;
                $user->status=$status;

                $user->save();

                return response()->json(['sucesso' => true, 'message' => 'Usuario cadastrado com sucesso', 'idRegister' => $user->id]);

            }
            if($type==="ADMINISTRADOR"){


                $user = new User();
                $user->name=$name;
                $user->email=$email;
                $user->cpf=$cpf;
                $user->password=$passCrypt;
                $user->type=$type;
                $user->status=$status;

                $user->save();

                return response()->json(['sucesso' => true, 'message' => 'Usuario cadastrado com sucesso', 'idRegister' => $user->id]);

            }





        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }





    }


    public function show(Request $request)
    {
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        $data = json_decode($request->getContent(), true);
        $id=$data['$user_id'];


        $users=User::where('id',$id)->get();







        return response()->json(['sucesso' => true, 'users' => $users[0]]);
    }


    public function edit(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }

        try {

            $dados = $request->validate([
                'name' => 'required',
                'cpf' => 'required',
                'type' => 'required',



            ]);

            $data = json_decode($request->getContent(), true);
            $name = $data['name'];
            $email = $data['email'];
            $cpf = $data['cpf'];
            $type = $data['type'];
            $status= $data['status'];
            $password = $data['password'];
            $id=$data['user_id'];





            $passCrypt = Hash::make($password);

            $users = User::find($id);
            $users->name=$name;
            $users->email=$email;
            $users->cpf=$cpf;
            if($password){
                $users->password=$passCrypt;
            }
            $users->type=$type;
            $users->status=$status;

            $users->save();

            return response()->json(['sucesso' => true, 'message' => 'Usuario editado com sucesso', 'idRegister' => $users->id]);


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
        $id = $data['user_id'];
        $type = $data['type'];

        if($type==="ADMINISTRADOR"){
            User::where('id',$id)->delete();
        }

        if($type==="DETENTO"){
            Detento::where('id',$id)->delete();
        }


        return response()->json(['sucesso' => true, 'excluido' => true]);
    }
}
