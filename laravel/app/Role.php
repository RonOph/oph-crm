<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $fillable = ['name','permissions'];

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
