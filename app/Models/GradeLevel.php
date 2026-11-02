<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    //
     protected $fillable = [
        'name',
        'description',
        'level'
    ];
    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }
}
