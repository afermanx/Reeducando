<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detento extends Model
{

    protected $table = 'detento';
    protected $fillable = [
        'name', 'cpf','email', 'password','status','type'
    ];

    public function list(){
        $detentos=Detento::orderBy('id', 'DESC')->get();

        return $detentos;
    }
}
