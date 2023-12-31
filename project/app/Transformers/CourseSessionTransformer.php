<?php
namespace App\Transformers;

use App\Models\CourseSession;
use League\Fractal;

class CourseSessionTransformer extends Fractal\TransformerAbstract
{
	public function transform(CourseSession $courseSession)
	{
	    return [
	    	'user_name' => (string) $courseSession->user_name, 
	    	'name' => (string) $courseSession->name, 
	        'id' => (int) $courseSession->id,
	        'user_id' => (int) $courseSession->user_id,
	        'course_id' => (int) $courseSession->course_id,
	        'score' => (double) $courseSession->score,
	        'status' => (string) $courseSession->status,
	        'created_at' => strtotime($courseSession->created_at),
	        'updated_at' => strtotime($courseSession->updated_at),
	    	'total_exercises' => (int) $courseSession->total_exercises,
	    ];
	}
}
