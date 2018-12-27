<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatePipe extends Model
{
    protected $table = 'candidate_pipe';

    public $fillable = ['can_id','job_id','jobapplication_id','pipe_id'];
    
    
}