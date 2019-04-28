@extends('layouts.app')

@section('content')
    <h1>Register New Course</h1>

    {{ Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) }}
        <div class="form-group">
            {{Form::label('user_id', 'Teacher')}}
            {{Form::select('user_id', $teachers -> pluck('name','id'), null, ['class' => 'form-control', 'placeholder' => 'Select a teacher'])}}
            <a href="/users">Add a new teacher</a>
        </div>
        <div class="form-group">
            {{Form::label('name', 'Course Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Class Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('semester_id', 'Semester')}}
            {{Form::select('semester_id', App\Semester::pluck('semester','id'), null, ['class' => 'form-control', 'placeholder' => 'Select a semester'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection