<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{

    protected $table = 'order_services';

    public function list(){
        $list_os=OrderService::orderBy('id', 'DESC')->get();

        return $list_os;
    }
}
