<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public $fillable = ['id','company_name','owner_name','email','mobile_number','telephone_number','website_url','note','status','logo'];
}
