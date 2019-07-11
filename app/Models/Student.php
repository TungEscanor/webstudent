<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name','class_id','birthday','gender',];

    public function class() {
        return $this->belongsTo(Classes::class);
    }
}
