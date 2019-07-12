<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name','class_id','birthday','gender','avatar'];

    public function specialty() {
        return $this->belongsTo(Specialty::class);
    }
}
