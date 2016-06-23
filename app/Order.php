<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

class Order extends \Eloquent
{
    protected $table = 'orders';
    protected $primaryKey = 'idorder';

    public function user() {
        return $this->hasOne('User', 'id');
    }

    public function goods_into_order() {
        return $this->hasOne('User', 'id');
    }
    
}
