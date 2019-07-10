<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Classes extends Model
{
    protected $table = 'classes';
    protected $guarded = [''];

    public function faculty() {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
}
