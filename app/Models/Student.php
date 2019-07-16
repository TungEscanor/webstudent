<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name','class_id','birthday','gender','avatar'];

    public function classRelation() {
        return $this->belongsTo(ClassModel::class,'class_id','id');
    }

    public function mark() {
        return $this->hasMany(Mark::class);
    }
}
