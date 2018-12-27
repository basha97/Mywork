<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $table = 'job';
    public $primarykey = 'id';

    public function req(){
    	return $this->hasOne('App\JobForm', 'job_id');
    }
    public function pipeline(){
    	return $this->hasMany('App\JobPipe', 'job_id');
    }
    public function department(){
    	return $this->belongsTo('App\Department');
    }

     public static function getjobname($id){
        $info = Job::find($id);
        if($info){
            return $info->job_title;
        }
        return '';
    }
}
