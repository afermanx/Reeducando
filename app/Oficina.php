<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'oficinas';

    protected $fillable=['name', 'description', 'status'];

    public function list(){
        $oficinas=Oficina::orderBy('id','DESC')->get();

        return $oficinas;
    }
}
