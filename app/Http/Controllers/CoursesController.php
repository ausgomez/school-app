<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\User;

use DB;

class CoursesController extends Controller
{
    
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', ['courses' => $courses]);
    }

    public function create()
    {
        $teachers = User::where('role', 2);

        return view('courses.create', ['teachers' => $teachers]);
    }

    public function store(Request $request)
    {
        // Validating form
        $this->validate($request, [
           'user_id' => 'required', 
           'semester_id' => 'required',
           'name' => 'required'
        ]);

        // Create course
        $course = new Course;
        $course -> user_id = $request -> input('user_id');
        $course -> name = $request -> input('name');
        $course -> semester_id = $request -> input('semester_id');
        $course -> save();

        return redirect('/courses', ['success' => 'Course Registered!']);

    }

    public function show($id)
    {
        $course = Course::find($id);

        return view("courses.show", ['course' => $course]);
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $teachers = User::where('role', 2); //find all teachers

        // Check for correct user
        if(self::checkAdmin() || auth()->user()->id == $course -> user_id){
            return view('courses.edit', ['course' => $course, 'teachers' => $teachers]);
        }else{
            return redirect('/courses', ['error' => 'You cannot edit this course.']);
        }
    }
    
    public function update(Request $request, $id)
    {

        // Check for correct user
        if(!self::checkAdmin() || auth()->user()->id != $course -> user_id){
            return redirect('/courses', ['error' => 'You cannot edit this course.']);
        }

        // Validating form
        $this->validate($request, [
            'user_id' => 'required', 
            'semester_id' => 'required',
            'name' => 'required'
         ]);

        // Create Course
        $course = Course::find($id);
        $course -> user_id = $request -> input('user_id');
        $course -> name = $request -> input('name');
        $course -> semester_id = $request -> input('semester_id');
        $course -> save();


        return redirect('/courses', ['success' => 'Course Updated!']);
    }

    
    public function destroy($id)
    {
        
        // Find and Delete Course
        $course = Course::find($id);

        // Check for correct user
        if(self::checkAdmin() || auth()->user()->id == $course -> user_id){
            
            $course -> delete();
            return redirect('/courses', ['success' => 'Course Deleted!']);
            
        }else{
            return redirect('/courses', ['error' => 'You cannot delete this course.']);
        }

        
    }
}
