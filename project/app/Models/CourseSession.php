<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSession extends Model
{
    /**
     * The attributes that is table name.
     *
     * @var array
     */
    protected $table = 'course_sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'course_id', 'score', 'status',
    ];

    /**
     * Relationship with User     
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Relationship with Course     
     * @return object
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    /**
     * Relationship with SessionExercise
     *     
     * @return object
     */
    public function exercises()
    {
        return $this->hasMany('App\Models\SessionExercise', 'exercise_id', 'id');
    }

     /**
     * A function to get all course sessions   
     *  
     * @return objects array
     */
    public function getAllSessions()
    {
        $courseSessions = $this
            ->join('users as u', 'u.id', '=', 'course_sessions.user_id')
            ->join('courses as co', 'co.id', '=', 'course_sessions.course_id')
            ->orderBy('created_at', 'DESC')
            ->selectRaw('u.name as user_name, co.name, course_sessions.*, (SELECT COUNT(*) FROM session_exercises AS ex WHERE ex.session_id = course_sessions.id ) AS total_exercises')
            ->get();

        return $courseSessions;
    }

    /**
     * A function to  user course sessions     
     *
     * @param $user integer
     *
     * @return objects array
     */
    public function getSessionsByUserId($userId)
    {
        $userCourseSessions= $this
                ->join('users as u', 'u.id', '=', 'course_sessions.user_id')
                ->join('courses as co', 'co.id', '=', 'course_sessions.course_id')
                ->where('u.id', '=', $userId)
                ->orderBy('created_at', 'DESC')
                ->selectRaw('u.name as user_name, co.name, course_sessions.*, (SELECT COUNT(*) FROM session_exercises AS ex WHERE ex.session_id = course_sessions.id ) AS total_exercises')
                ->get();

        return $userCourseSessions;
    }
}
