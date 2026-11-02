<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'name',
        'track_id',
        'description',
        'max_grade',
        'passing_grade',
        'status',
    ];
    public function curricula()
    {
        return $this->belongsToMany(Curriculum::class, 'curriculum_subjects')->withPivot('weekly_hours')
            ->withTimestamps();
    }
    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
