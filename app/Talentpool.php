<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Talentpool extends Model
{
    protected $table = 'talentpool';

    protected $fillable = ['title','department_id','description'];

    public function department(){
    	return $this->belongsTo('App\Department');
    }

}
