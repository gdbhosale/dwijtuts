<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Course;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class CourseController extends Controller {

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $courses = Course::all();
        if (Auth::user()) {
            return view('courses.index', [
				'courses' => $courses
            ]);
        } else {
            return view('home');
        }
    }

}

