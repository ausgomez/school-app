@extends('layouts.app')

@section('content')
    <h1>Register New Course</h1>

    {!! Form::open(['action' => ['CoursesController@update', $course -> id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('user_id', 'Teacher')}}
            {{Form::select('user_id', $teachers -> pluck('name','id'), $course->user_id, ['class' => 'form-control', 'placeholder' => 'Select a teacher'])}}
            <a href="/users">Add a new teacher</a>
        </div>
        <div class="form-group">
            {{Form::label('name', 'Course Name')}}
            {{Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Class Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('semester_id', 'Semester')}}
            {{Form::select('semester_id', App\Semester::pluck('semester','id'), $course->semester_id, ['class' => 'form-control', 'placeholder' => 'Select a semester'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection