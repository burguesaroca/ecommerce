<?php

namespace App\Model\Security;

use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    protected $hidden = ['pivot'];

    protected $table = 'dependences';
}
