<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function good_into_order() {
        return $this->belongs_to('Good_into_order');
    }
}
