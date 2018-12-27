<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'can_email';
    
     protected $fillable = ['email','can_id'];

     public $timestamps = false ;    
}