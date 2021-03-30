<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Episode extends Model
{
    use HasFactory;

    //quelles formations appartient a une Episodes
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
