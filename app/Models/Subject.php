<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['name','faculty_id','id'];

    public function faculty() {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }

    public function students() {
        return $this->belongsToMany(Subject::class,'marks');
    }

    public function classRelation () {
        return $this->hasMany(ClassModel::class,'faculty_id','faculty_id');
    }
}
