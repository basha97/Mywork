<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   protected $table = 'department';
   
   public $primarykey = 'id';

   public function department(){
   	 return $this->belongsTo('App\TalentPool', 'department_id','id');
   }
}
