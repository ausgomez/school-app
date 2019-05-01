<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User; //import users
use App\Course;
use App\UserCourse;

class MyUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('role', 'asc') -> get();

        return view('myusers.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myusers.create');
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
            'name' => 'required',  
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
         ]);
 
         // Create user
         $user = new User;
         $user -> name = $request -> input('name');
         $user -> email = $request -> input('email');
         /* To create the password we need to hash it first */
         $user -> password = Hash::make($request -> input('password'));
         $user -> role = $request -> input('role');
         $user -> save();
 
         return redirect('/users') -> with('success', 'User Registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $courses = null;

        if ($user -> role == 1){
            $courses = UserCourse::where('user_id', $user->id) -> get();
        }elseif ($user -> role == 2){
            $courses = Course::where('user_id', $user->id) -> get();
        }

        return view('myusers.show', ['user' => $user, 'courses' => $courses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        
        return view('myusers.edit', ['user' => $user]);
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
        // Validating form
        $this->validate($request, [
            'name' => 'required',  
            'email' => 'required',
            'role' => 'required'
         ]);

         // Find user
         $user = User::find($id);
         $user -> name = $request -> input('name');
         $user -> email = $request -> input('email');
         /* To create the password we need to hash it first */
         if($request -> input('password') != ""){
            $user -> password = Hash::make($request -> input('password'));
         }
         $user -> role = $request -> input('role');
         $user -> save();
 
         return redirect('/users') -> with('success', 'User Updated!');
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
