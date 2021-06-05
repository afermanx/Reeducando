<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = [
        'name', 'cpf','email', 'password','status','type'
    ];
    public function list(){
        $clientes=Cliente::orderBy('id', 'DESC')->get();

        return $clientes;
    }

}
