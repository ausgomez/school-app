<?php

namespace App\Http\Controllers;

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
        $id = \Auth::user()->id;
        $role = 'N/A';

        if ($id === 1) {
            $role = 'student';
        }else if ($id === 2) {
            $role = 'teacher';
        }else if ($id === 3) {
            $role = 'admin';
        }

        //return view('pages.index', compact('title'));
        return view('dashboard')->with('role', $role);
    }
}
