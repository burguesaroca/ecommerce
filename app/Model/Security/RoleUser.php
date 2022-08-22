<?php

namespace App\Model\Security;

use Illuminate\Database\Eloquent\Model;
use App\User;
// use App\Model\Security\Dependencies;
// use App\Model\Security\DependencyRoleUsers;

class RoleUser extends Model
{
    protected $table = 'role_user';
   

    public function dependences()
    {
        return $this->belongsToMany('App\Model\Security\Dependence');
    }
   
}
