<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UsersLoginController extends Controller
{
//    use AuthenticatesUser;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    public function loginForm(){
        return view('Auth.login');

    }
    public function registerForm(){

        return view('Auth.register');

    }
    public function login(Request $request){

        $this->validate($request, [
            'cpf' => 'required',
            'password' => 'required'
        ]);

        $credenciais = [
            'cpf' => $request->cpf,
            'password' => $request->password


        ];


        $authOK = Auth::guard('user')->attempt($credenciais);
        if ($authOK) {

//            return redirect()->intended(route('painel'));
            $login['success']=true;
            echo json_encode($login);
            return;


        }


        //return back()->withInput();
        $login['success']=false;
        $login['message']='Os DADOS INSERIDOS NÃO CONFEREM';
        echo json_encode($login);
        return;


    }

    public function register(Request $request){

    }
    public function rememberPassword(Request $request){

    }

    public function logout(){
        $this->middleware('guest')->except('logout');
    }
    public function __construct()
    {
        $this->middleware('guest:user');

    }
}
