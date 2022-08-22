<?php

namespace App\Model\Gestion;

use Illuminate\Database\Eloquent\Model;
use App\Model\Gestion\Order;

class Client extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
