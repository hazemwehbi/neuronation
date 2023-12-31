<?php
namespace App\Transformers;

use App\Models\SessionExercise;
use League\Fractal;

class SessionExerciseTransformer extends Fractal\TransformerAbstract
{
	public function transform(SessionExercise $sessionExercise)
	{
	    return [
			"id" => (int) $sessionExercise->id,
			"name" => (string) $sessionExercise->name ,
			"category_id" => (int) $sessionExercise->category_id,
			"session_id" => (int) $sessionExercise->session_id,
			"score" => (double) $sessionExercise->score,
			"created_at" => strtotime($sessionExercise->created_at),
			"updated_at" => strtotime($sessionExercise->updated_at),
			"category_name" => (string) $sessionExercise->category_name
		];
	}
}