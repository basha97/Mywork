<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public $primarykey = 'id';
    public static function countrySelect(){
    	 return Country::pluck('name','id');
    }

    public static function getCountryname($id){
    	 return Country::find($id)->name;
    }

    public function state()
    {
    	return $this->hasMany('App\State');
    }
}
