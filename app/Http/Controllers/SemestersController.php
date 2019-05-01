<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Semester;
use DB;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        return view('semesters.index', ['semesters' => $semesters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating form
        $this->validate($request, [
            'semester' => 'required', 
            'year' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
         ]);
 
         // Create semester
         $semester = new Semester;
         $semester -> semester = $request -> input('semester');
         $semester -> year = $request -> input('year');
         $semester -> start_date = $request -> input('start_date');
         $semester -> end_date = $request -> input('end_date');
         $semester -> save();
 
         return redirect('/semesters') -> with ('success', 'Semester Registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
