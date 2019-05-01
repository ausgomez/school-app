<?php

namespace App\Http\Controllers;

use Auth;
use App\UserCourse;
use App\Course;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $user = Auth::user();
        $role = 'N/A';
        $courses = null;

        if ($user->role === 1) {
            $role = 'Student';
            $courses = UserCourse::where('user_id', $user->id) -> get();
        }else if ($user->role === 2) {
            $role = 'Instructor';
            $courses = Course::where('user_id', $user->id) -> get();
        }else if ($user->role === 3) {
            $role = 'ADMIN';
        }

        return view('dashboard', ['role' => $role, 'courses' => $courses]);
    }
}
