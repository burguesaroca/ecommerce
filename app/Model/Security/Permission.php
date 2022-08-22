<?php

namespace App\Model\Security;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $hidden = ['pivot'];
    
    public function modules()
    {
        return $this->belongsTo('App\Model\Security\Module','module_id','id');
    }
    
}
