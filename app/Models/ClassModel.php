<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ClassModel extends Model
{
    protected $table = 'classes';
    protected $fillable=['name', 'faculty_id','id'];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    public function faculties() {
        return $this->hasMany(Faculty::class,'id','faculty_id');
    }

    public function student() {
        return $this->hasMany(Student::class,'class_id','id');
    }

    public function subject() {
        return $this->hasOne(Subject::class,'faculty_id','faculty_id');
    }
}
