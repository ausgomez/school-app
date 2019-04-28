@extends('layouts.app')

@section('content')
    <h1 class="display-4">Courses</h1>
    
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
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">View</button>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
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