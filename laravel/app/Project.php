<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public $fillable = ['official_project_id','contract_id','name','description','category','amount','total_work_hour','status'];

    public function contract()
    {
    	return $this->belongsTo('App\Contract');
    }
}
