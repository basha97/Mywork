<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'can_number';
    
    protected $fillable = ['number','can_id'];

    public $timestamps = false ;  
    
}