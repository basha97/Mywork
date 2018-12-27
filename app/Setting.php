<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     protected $table = 'profile';
     
     public $fillable = ['f_name','l_name','email','phone','u_img'];
}
