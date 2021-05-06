<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
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
        $users = new User();
        $data= $users->list();


        return view('Admin.Register.Users.index')
            ->with('user', $user)
            ->with('users',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = Auth::guard('user')->user();
        if (!$user) {
            return response()->json(['sucesso' => false, 'message' => 'Sessão inválida. Você deve fazer login novamente']);
        };

        try {

            $dados = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'type' => 'required',



            ]);

            $data = json_decode($request->getContent(), true);
            $name = $data['name'];
            $email = $data['email'];
            $type = $data['type'];
            $password = $data['password'];

            $passCrypt = Hash::make($password);

            $users = new User();
            $users->name=$name;
            $users->email=$email;
            $users->password=$passCrypt;
            $users->type=$type;
            $users->status="Ativo";
            $users->save();

            return response()->json(['sucesso' => true, 'message' => 'Usuario cadastrado com sucesso', 'idRegister' => $users->id]);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['sucesso' => false, 'message' => 'Erro ao validar dados', 'erro' => $e->errors()]);
        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $user = Auth::guard('user')->user();
        $data = json_decode($request->getContent(), true);


        $users = $data['user_id'];

        User::where('id',$users)->delete();



        return response()->json(['sucesso' => true, 'excluido' => true]);
    }
}
