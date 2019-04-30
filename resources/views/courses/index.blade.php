@extends('layouts.app')

@section('content')
    <h1 class="display-4">Courses</h1>
    <a href="/courses/create" class="btn btn-primary">Register Course</a>
    <p></p>
    @if(count($courses) > 0)
        
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Instructor</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                <th scope="row">{{$course->id}}</th>
                <td>{{$course->name}}</td>
                <td>{{$course -> user -> name}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Controls">
                        <a href="/courses/{{$course -> id}}" class="btn btn-primary">View</a>
                        <a href="/courses/{{$course -> id}}/edit" class="btn btn-warning">Edit</a>
                        {!!Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No Courses found</p>
    @endif

@endsection