<?php

namespace App\Model\Security;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function aplications()
    {
        return $this->belongsTo('App\Model\Security\Aplication','aplication_id','id');
    }
}
