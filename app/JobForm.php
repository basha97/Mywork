<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobForm extends Model
{
    protected $table = 'application_form';

    protected $fillable = ['job_id','phone','photo','cv','cover_letter'];

    

 }
