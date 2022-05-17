@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header"><b><h4><center>{{ $mentor->faculties->name }}  -  {{$mentor->faculties->departments->name }}</center></h4></b></div><br><br>
        <div class="card-body">
            <pre>
            <p class="card-text"><strong><b>MENTOR NAME     -->    {{ $mentor->faculties->name }}</b></strong></p>
            <p class="card-text"><strong><b>FACULTY ID      -->    {{ $mentor->faculties->facultyid }}</b></strong></p>
            <p class="card-text"><strong><b>STUDENT NAME    -->    {{ $mentor->students->name }}</b></strong></p>
            <p class="card-text"><strong><b>STUDENT ROLLNO  -->    {{ $mentor->students->rollno }}</b></strong></p>
            <p class="card-text"><strong><b>MENTOR STATUS   -->    {{ $mentor->mentor_status }}</b></strong></p>


        </div>
        </div>
    </div>
</div>
@endsection
