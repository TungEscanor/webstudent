<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Classes extends Model
{
    protected $fillable=['name', 'faculty_id'];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
