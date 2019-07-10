<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';

    public function student()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject','subject_id');
    }
}
