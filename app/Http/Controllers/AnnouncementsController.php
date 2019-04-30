<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Announcement;
use App\User;

use DB;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', ['courses' => $courses]);
    }
    
    public function create()
    {
        $announcements = Announcement::all();
        return view('announcements.index', ['announcements' => $announcements]);
    }
    
    public function store(Request $request)
    {
        // Validating form
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required'
         ]);
 
         // Create course
         $anno = new Announcement;
         $anno -> title = $request -> input('title');
         $anno -> body = $request -> input('body');
         $anno -> course_id = $request -> input('course_id');
         $anno -> save();
 
         
         return redirect()->action(
            'CoursesController@show', ['id' => $anno->course_id]
        ) -> with('success', 'Announcement Registered!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
