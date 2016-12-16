<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    //
    public $fillable = ['link','username','password','type','client_id'];

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }
}
