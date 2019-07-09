<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function class() {
        return $this->hasOne('Models\Classes', 'id','name');
    }
}
