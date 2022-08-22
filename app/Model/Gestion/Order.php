<?php

namespace App\Model\Gestion;

use Illuminate\Database\Eloquent\Model;
use App\Model\Gestion\OrderDetail;

class Order extends Model
{
    public function clients()
    {
        return $this->belongsTo('App\Model\Gestion\Client','client_id','id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
