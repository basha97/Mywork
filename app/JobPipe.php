<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPipe extends Model
{
    protected $table = 'job_pipe';

    protected $fillable = ['job_id','phone','photo','cv','cover_letter'];

   	public function pipelineMaster() {
   		return $this->belongsTo('App\Pipeline', 'id', 'sorting_order');
   	}

 }
