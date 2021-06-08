<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaixaDetento extends Model
{
    protected $table = 'caixa_detento';

    protected $fillable = [
        'detento_id', 'valor'
    ];

    public function list(){
        $cxDetentos=CaixaDetento::orderBy('id', 'DESC')->get();

        return $cxDetentos;
    }
}
