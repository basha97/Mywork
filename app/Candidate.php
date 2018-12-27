<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';

    protected $fillable = ['name','email','number','resume','profile_path'];

    public function email() {
    	return $this->hasMany('App\Email', 'can_id', 'id');
    }

    public function number() {
    	return $this->hasMany('App\Phone', 'can_id', 'id');
    }

    public static function getname($id){
    	$info = Candidate::find($id);
    	if($info){
    		return $info->name;
    	}
    	return '';
    }
    
    public static function getprofile($id){
    	$info = Candidate::find($id);
    	if($info){
    		return $info->profile_path;
    	}
    	return '';
    }
    
}
