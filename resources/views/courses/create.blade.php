@extends('layouts.app')

@section('content')
    <h1>Register New Class</h1>
    {{ Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) }}
        <div class="form-group">
            {{Form::label('user_id', 'User')}}
            {{Form::text('user_id', '', ['class' => 'form-control', 'placeholder' => 'User Id'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Class Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Class Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('semester_id', 'Semester')}}
            {{Form::text('semester_id', '', ['class' => 'form-control', 'placeholder' => 'Semester Id'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection