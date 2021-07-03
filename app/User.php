<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = "user";

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cpf','email', 'password','status','type', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $username;
    /**
     * @var mixed'
     */
    private $id;



    public function username()
    {
        return $this->cpf;
    }

    public function getAuthPassword() {

        return $this->password;
    }


    public function list(){
        $users=User::orderBy('id', 'DESC')->get();

        return $users;
    }

}
