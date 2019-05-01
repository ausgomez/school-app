<?php

namespace App\Http\Controllers;

use Auth;

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

        if ($user->role === 1) {
            $role = 'Student';
        }else if ($user->role === 2) {
            $role = 'Instructor';
        }else if ($user->role === 3) {
            $role = 'ADMIN';
        }

        //return view('pages.index', compact('title'));
        return view('dashboard')->with('role', $role);
    }
}
