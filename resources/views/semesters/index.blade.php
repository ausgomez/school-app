@extends('layouts.app')

@section('content')
    <h1 class="display-4">Semesters</h1>
    <a href="/semesters/create" class="btn btn-primary">Register Semester</a>
    <p></p>
    @foreach ($semesters as $semester)
        <h5>{{ $semester -> semester }}</h5>
    @endforeach
    

@endsection