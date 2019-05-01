<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validating form
        $this->validate($request, [
            'type' => 'required', 
            'course_id' => 'required',
            'name' => 'required',
            'instructions' => 'required',
            'grade' => 'required',
         ]);
 
         // Create Assignment
         $assi = new Assignment;
         $assi -> type = $request -> input('type');
         $assi -> name = $request -> input('name');
         $assi -> instructions = $request -> input('instructions');
         $assi -> course_id = $request -> input('course_id');
         $assi -> due_date = $request -> input('due_date');
         $assi -> grade = $request -> input('grade');
         $assi -> save();
 
         return redirect()->action(
            'CoursesController@show', ['id' => $assi->course_id]
        ) -> with('success', 'Assignment Registered!');
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
