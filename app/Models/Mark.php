<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';

    protected $fillable=['student_id','subject_id','mark'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject','subject_id');
    }
}
