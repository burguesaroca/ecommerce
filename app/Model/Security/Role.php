<?php

namespace App\Model\Security;


use App\User;
use App\Model\Security\RoleUser;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $hidden = ['pivot'];
    
    public function permissions()
    {
        return $this->belongsToMany('App\Model\Security\Permission');
    }

    public function aplications() {
        return $this->belongsTo(Aplication::class, 'aplication_id','id');
    }   
    
    public function scopeSearch($query, $search){
        return $query
            ->where('name','LIKE','%'.$search.'%')
            ->orwhere('slug','LIKE','%'.$search.'%');        
    }
    
     public function scopeSearcha($query, $user, $aplication)
    {
        return $query->where('id', $user)
        ->with(['roles' => function ($query) use($aplication) {
            $query->where('roles.aplication_id', '>=', $aplication);
        }]);
    }
      
    public function roleusers()
    {
        return $this->hasMany(RoleUser::class);
    }
 
    }


