<?php

namespace App\Model\Gestion;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "orders_detail";

    public function products()
    {
        return $this->belongsTo('App\Model\Gestion\Product','product_id','id');
    }
}