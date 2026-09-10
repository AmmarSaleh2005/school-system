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
    protected $fillable = ['name', 'description', 'capacity'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
