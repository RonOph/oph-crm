<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public $fillable = ['id','company_name','owner_name','email','contact_number','website_url'];
}
