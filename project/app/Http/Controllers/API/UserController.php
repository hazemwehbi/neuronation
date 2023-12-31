<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\CourseSession;
use App\Models\SessionExercise;
use App\Transformers\CourseSessionTransformer;
use App\Transformers\SessionExerciseTransformer;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection as FracCollection;


class UserController extends BaseController
{

    private $courseSession;
    private $sessionExercise;

    /**
     * Create a new controller instance.
     *
     * @param $courseSession \App\Models\CourseSession
     * @param $sessionExercise \App\Models\SessoinExercise
     *
     * @return void
     */
    public function __construct(CourseSession $courseSession, SessionExercise $sessionExercise, Manager $fractal)
    {
        $this->courseSession = $courseSession;
        $this->sessionExercise = $sessionExercise;
        $this->fractal = $fractal;

    }

    /**
     * User sessions API
     * @param $userId integr
     * @param $request \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */

    public function getUserSessionsByUserId($userId = 0, Request $request)
    {
        try {

            $courseSessionsCollections = $this->courseSession->getSessionsByUserId($userId);
            $courseSessions = [];
            if($collectionCount = count($courseSessionsCollections)){
                $courseSessionResources = new FracCollection($courseSessionsCollections, new CourseSessionTransformer);
                // Turn that into array
                $courseSessionsData = $this->fractal->createData($courseSessionResources)->toArray();
                $courseSessions = $courseSessionsData['data'];
            }

            $success['history'] =  $courseSessions;
            $meta['row_count'] =  $collectionCount;
            $meta['message'] = $meta['row_count'] ? 'Total '.$meta['row_count'].' record(s) found': 'No record found';

            return $this->sendResponse($success, $meta);
        } catch (\Exception $e) {

            return $this->sendError('SYSTEM ERROR.', ['error'=> $e->getMessage() ]);
            return $this->sendError('SYSTEM ERROR.', ['error'=>'System is not responding. Please try again.']);
        }
    }


    /**
     * User latest sessions' exercises (by default latest 12 sessions) API
     * @param $userId integr
     * @param $request \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserExercisesByUserId($userId = 0,Request $request)
    {
        try {
            $latestSessionExerciseCollection = $this->sessionExercise->getLatestExercisesByUserId($userId);
            $sessionExercises = $this->sessionExercise->getExercisesByUserId($userId);

            $latestSessionExercise = [];
            if( $latestSessionExerciseCollection ){
                $latestSessionExerciseResource = new FracCollection($latestSessionExerciseCollection, new SessionExerciseTransformer);
                // Turn that into array
                $latestSessionExerciseData = $this->fractal->createData($latestSessionExerciseResource)->toArray();
                $latestSessionExercise = $latestSessionExerciseData['data'];
            }

            $success['exercises'] =  $sessionExercises;
            $success['lastest_exercise'] =  $latestSessionExercise;
            $meta['row_count'] =  count($sessionExercises);
            $meta['message'] = $meta['row_count'] ? 'Total '.$meta['row_count'].' record(s) found': 'No record found';

            return $this->sendResponse($success, $meta);
        } catch (\Exception $e) {
            return $this->sendError('SYSTEM ERROR.', ['error'=>'System is not responding. Please try again.']);
        }
    }
}
