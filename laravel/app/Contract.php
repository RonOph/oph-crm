<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    public $fillable = ['official_contract_id','client_id','name','amount','start_date','end_date','collection_schedule'];
   
    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

}
