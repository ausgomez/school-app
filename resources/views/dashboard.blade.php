@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="jumbotron jumbotron-fluid">
                <div class="container text-center">
                    <h1 class="display-4"> Welcome {{ Auth::user()->name }}!</h1>
                    <p class="lead">Good to see you back!</p>
                </div>
            </div>
        </div>
        <div class="col-md-5"> 
            <div class="card text-white bg-dark mb-3">
            <div class="card-header">My Info</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <h5>Email:</h5>
                <p>{{ Auth::user()->email }}</p>
                <h5>Account type:</h5>
                <p>{{ $role }}</p>
                <h5>Member since: </h5>
                <p>{{ Auth::user()->created_at }}</p>
            </div>
            </div>
        </div>

        @if (Auth::user()->role != 3)
        <div class="col-md-8">
            <h1>My Classes</h1>
            @if(Auth::user()->role == 1)
                @foreach($courses as $course)
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $course -> course -> name}} - {{ $course -> course -> semester -> semester}} </h5>
                                <p class="card-text">Instructor: {{ $course -> course -> user -> name}}</p>
                            </div>
                            <div class="col-md-3">
                            <a class="btn btn-primary float-right" href="/courses/{{$course -> id}}" role="button">Go <span class="badge badge-light">{{ App\Assignment::where('course_id', $course -> id)-> count()}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @elseif(Auth::user()->role == 2)
                @foreach($courses as $course)
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $course -> name}} - {{ $course -> semester -> semester}} </h5>
                            </div>
                            <div class="col-md-3">
                            <a class="btn btn-primary float-right" href="/courses/{{$course -> id}}" role="button">Go <span class="badge badge-light">{{ App\Assignment::where('course_id', $course -> id)-> count()}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            
        </div>
        @endif
    </div>
</div>
@endsection
