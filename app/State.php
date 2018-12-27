<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     protected $table = 'state';
    public $primarykey = 'id';

     public static function stateSelect(){
    	 return state::pluck('name','id');
    }
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }
}
