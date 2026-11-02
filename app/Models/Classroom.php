<?php

namespace App\Models;

use App\Http\Controllers\Dashboard\TeachersController;
use App\Http\Controllers\Dashboard\StudentsController;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Teacher;

class Classroom extends Model
{
    //
    protected $fillable = ['name', 'description', 'capacity', 'curriculum_id', 'grade_level_id', 'track_id'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
    public function gradelevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id', 'id');
    }
    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
