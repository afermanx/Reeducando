<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'description','value',' detainee', 'workshop'
    ];

    public function list(){
        $services=Service::orderBy('id', 'DESC')->get();

        return $services;
    }
}
