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
}
