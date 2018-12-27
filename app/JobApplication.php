<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_application';    

    public $fillable = ['can_id','job_id','department_id'];

    public function candidate(){

    	return $this->belongsTo('App\Candidate','can_id','id');
    }

    public function job(){ 

    	return $this->belongsTo('App\Job','job_id','id','job_department');
    }

}

