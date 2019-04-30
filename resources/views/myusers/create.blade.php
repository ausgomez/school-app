@extends('layouts.app')

@section('content')
    <h1>Register New User</h1>
    
    {{ Form::open(['action' => 'MyUsersController@store', 'method' => 'POST']) }}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            {{Form::select('role', [1 => 'Student', 2 => 'Instructor', 3 => 'Admin'], null, ['class' => 'form-control', 'placeholder' => 'Pick a role...'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection