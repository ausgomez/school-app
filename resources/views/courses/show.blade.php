@extends('layouts.app')

@section('content')
    <h1>{{ $course -> name }} - {{ $course -> semester -> semester }}</h1>

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-assignments" role="tab" aria-controls="v-pills-assignments" aria-selected="false">Assignments</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-grades" role="tab" aria-controls="v-pills-grades" aria-selected="false">Grades</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to {{ $course -> name }}</h5>
                        <p class="card-text">My name is {{$course -> user -> name}}, and I am your instructor for this course.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <br>
                <h1>Announcements</h1>
                <br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info text-white" data-toggle="modal" data-target="#newAnnoModal">
                    New Announcement
                </button>
                <p></p>
                @foreach($annos as $ann)
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">
                            {{$ann -> title}}
                            <small class="float-right">{{$ann -> created_at}}</small>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{$ann -> body}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="v-pills-assignments" role="tabpanel" aria-labelledby="v-pills-assignments-tab">
                
            </div>
            <div class="tab-pane fade" id="v-pills-grades" role="tabpanel" aria-labelledby="v-pills-grades-tab">

            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                
            </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="newAnnoModal" tabindex="-1" role="dialog" aria-labelledby="newAnnoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['action' => 'AnnouncementsController@store', 'method' => 'POST']) }}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body', 'Content')}}
                        {{Form::textarea('body', '', ['class' => 'form-control'])}}
                    </div>
                    {{Form::hidden('course_id', $course -> id, ['class' => 'form-control'])}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>

@endsection