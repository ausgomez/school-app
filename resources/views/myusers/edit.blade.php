@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    
    {{ Form::open(['action' => ['MyUsersController@update', $user -> id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user -> name, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $user->email, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Type new password'])}}
        </div>
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            {{Form::select('role', [1 => 'Student', 2 => 'Instructor', 3 => 'Admin'], $user -> role, ['class' => 'form-control', 'placeholder' => 'Pick a role...'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection
