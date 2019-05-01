@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">{{ $user -> name }}</h1>
                    <p class="lead">Email: <a href="mailto:{{ $user -> email }}">{{ $user -> email }}</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    @if($user -> role == 1)
                        <h3>Student</h3>
                        <h5>Registered Courses:</h5>
                        @foreach($courses as $course)
                            <p><a href="/course/{{$course -> course -> id}}">{{$course -> course -> name}}</a></p>
                        @endforeach
                    
                    @elseif($user -> role == 2)    
                        <h3>Instructor</h3>
                        <h5>Teaching:</h5>
                        @foreach($courses as $course)
                            <p><a href="/course/{{$course -> id}}">{{$course -> name}}</a></p>
                        @endforeach
                    @elseif($user -> role == 3)  
                    <h3>Admin User</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    

@endsection