<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficinaTransacao extends Model
{
    protected $table = "oficina_transacao";

    protected $fillable = ['oficina_id', 'description', 'valor', 'valorOficina', 'status'];


    public function list()
    {
        $oficinaTransacao = OficinaTransacao::orderby('id', 'desc')->get();

        return $oficinaTransacao;
    }
}
