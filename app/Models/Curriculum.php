<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'track_id',
        'grade_level_id'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'curriculum_subjects')->withPivot('weekly_hours')
        ->withTimestamps();
    }
    public function track()
    {
        return $this->belongsTo(Track::class);
    }
    public function gradelevel()
    {
        return $this->belongsTo(GradeLevel::class,'grade_level_id','id');
    }
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
