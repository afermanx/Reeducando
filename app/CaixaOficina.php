<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaixaOficina extends Model
{
    protected $table = 'caixa_oficina';

    protected $fillable = [
        'oficina_id', 'valor'
    ];

    public function list()
    {
        $cxOficinas = CaixaDetento::orderBy('id', 'DESC')->get();

        return $cxOficinas;
    }
}
