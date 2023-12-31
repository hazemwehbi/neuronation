<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionExercise;

class HomeController extends Controller
{
    private $sessionExercise;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SessionExercise $sessionExercise)
    {
        $this->middleware('auth');
        $this->sessionExercise = $sessionExercise;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exercises = $this->sessionExercise->getExercisesByUserId($request->user()->id);
        $latestExercise = $this->sessionExercise->getLatestExercisesByUserId($request->user()->id);
        return view('home', compact('exercises', 'latestExercise'));
    }
}
