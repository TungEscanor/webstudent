<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Specialty extends Model
{
    protected $table = 'specialties';
    protected $fillable=['name', 'faculty_id'];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
