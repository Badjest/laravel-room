<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good_into_order extends Model
{
    public static $table = 'goods_into_orders';

    public function good() {
        return $this->has_one('Good', 'idgood');
    }

    public function order() {
        return $this->has_one('Order', 'idorder');
    }
}
