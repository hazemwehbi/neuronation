<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relationship with CourseSession
     *     
     * @return object
     */
    public function sessions()
    {
        return $this->hasMany('App\Models\CourseSession', 'course_id', 'id');
    }
}
