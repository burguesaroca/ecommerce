<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Security\Role');
    }

    public function scopeSearch($query, $search){
        return $query
            ->where('name','LIKE','%'.$search.'%')
            ->orwhere('email','LIKE','%'.$search.'%');
    }

    public function scopeSearchAplicationPermission($query, $aplication)
    {
        return $query->where('id', auth()->user()->id)
        ->with(['roles' => function ($query) use($aplication) {
            $query->where('roles.aplication_id', '=', $aplication);
        }]);
    }
}
