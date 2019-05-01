@extends('layouts.app')

@section('content')
    <h1>Register New Semester</h1>

    {{ Form::open(['action' => 'SemestersController@store', 'method' => 'POST']) }}
        <div class="form-group">
            {{Form::label('semester', 'Semester Name')}}
            {{Form::text('semester', '', ['class' => 'form-control', 'placeholder' => 'Semester Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('year', 'Semester Year')}}
            {{Form::text('year', '', ['class' => 'form-control', 'placeholder' => 'Semester Year'])}}
        </div>
        <div class="form-group">
            {{Form::label('start_date', 'Semester Start Date')}}
            {{Form::date('start_date', '', ['class' => 'form-control', 'placeholder' => 'Semester Start Date'])}}
        </div>
        <div class="form-group">
            {{Form::label('end_date', 'Semester End Date')}}
            {{Form::date('end_date', '', ['class' => 'form-control', 'placeholder' => 'Semester End Date'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection