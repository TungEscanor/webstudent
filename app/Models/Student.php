<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function class() {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }
}
