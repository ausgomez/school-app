@extends('layouts.app')

@section('content')
    <h1 class="display-4">Users</h1>
    <a href="/users/create" class="btn btn-primary">Register User</a>
    <p></p>
    <div class="row">
            @if(count($users) > 0)
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user -> role == 1)
                            Student
                        @elseif($user -> role == 2)
                            Instructor
                        @elseif($user -> role == 3)
                            Admin
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Controls">
                            <a href="/users/{{$user -> id}}" class="btn btn-primary">View</a>
                            <a href="/users/{{$user -> id}}/edit" class="btn btn-warning">Edit</a>
                            
                        </div>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No Users found</p>
        @endif
    </div>

@endsection