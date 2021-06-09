<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacoes extends Model
{
    protected $table="transacoes";

    protected $fillable=['detento_id','oficina_id','description', 'valor','valorDetento', 'valorOficina', 'status'];


    public function list(){
        $transcoes=Transacoes::orderby('id', 'desc')->get();

        return $transcoes;
    }
}
