<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class StudentController extends Controller {

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
       
        // Get Students Courses
        $courses = Course::all();
        if (Auth::user() && Auth::user()->type == "Student") {
            return view('students.show', [
				'courses' => $courses
            ]);
        } else {
            return view('home');
        }
    }

}

