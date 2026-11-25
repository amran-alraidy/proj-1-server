<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Course;

class Student extends Model
{
    protected $fillable = ['name','phone'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
