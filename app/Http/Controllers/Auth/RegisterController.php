<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Role;
use Eloquent;
use App\Models\Employee;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
    */
    public function redirectPath()
    {
        if (Auth::user() && Auth::user()->type == "Student") {
            return "/student";
        } else if(Auth::user() && Auth::user()->type == "Employee") {
            return "/admin";
        } else {
            return "/login";
        }
    }

    public function showRegistrationForm()
    {
        $roleCount = Role::count();
		if($roleCount != 0) {
			$userCount = User::count();
			if($userCount == 0) {
				return view('auth.register');
			} else {
				return redirect('login');
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $userCount = User::count();
        if($userCount == 0) {
            // Register Super Admin Validator
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);
        } else {
            // Register Student Validator
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                //'mobile' => 'required|mobile|max:25|unique:users',
                'password' => 'required|min:6|confirmed',
                'college' => 'required|max:255',
                'degree' => 'required|max:255',
                'city' => 'required|max:20'
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // TODO: This is Not Standard. Need to find alternative
        Eloquent::unguard();
        if(isset($data['reg_type']) && $data['reg_type'] == "STUDENT") {
            $student = Student::create([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'college' => $data['college'],
                'degree' => $data['degree'],
                'city' => $data['city'],
            ]);
            
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'context_id' => $student->id,
                'type' => "Student",
            ]);
            $role = Role::where('name', 'STUDENT')->first();
            $user->attachRole($role);
         } else {
             $employee = Employee::create([
                'name' => $data['name'],
                'designation' => "Super Admin",
                'mobile' => "8888888888",
                'mobile2' => "",
                'email' => $data['email'],
                'gender' => 'Male',
                'dept' => "1",
                'city' => "Pune",
                'address' => "Karve nagar, Pune 411030",
                'about' => "About user / biography",
                'date_birth' => date("Y-m-d"),
                'date_hire' => date("Y-m-d"),
                'date_left' => date("Y-m-d"),
                'salary_cur' => 0,
            ]);
            
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'context_id' => $employee->id,
                'type' => "Employee",
            ]);
            $role = Role::where('name', 'SUPER_ADMIN')->first();
            $user->attachRole($role);
        }
        return $user;
    }
}
