<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name', 'class_id', 'birthday', 'gender', 'avatar', 'phone_number'];

    public function classRelation()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'id');
    }

    public function mark()
    {
        return $this->hasMany(Mark::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'marks');
    }

    public function subjectFaculty() {
        return $this->belongsToMany(Subject::class, 'faculties');
    }
}
