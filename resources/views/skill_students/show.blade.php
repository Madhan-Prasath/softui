@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header"><b><h4><center>{{ $skill_student->students->name }}  -  {{$skill_student->students->rollno }}</center></h4></b></div><br><br>
        <div class="card-body">

      <pre> <p class="card-text"><strong><b> NAME            -->    {{ $skill_student->students->name }}</b></strong></p>
            <p class="card-text"><strong><b> ROLLNO          -->    {{ $skill_student->students->rollno }}</b></strong></p>
            <p class="card-text"><strong><b> EMAIL           -->    {{ $skill_student->students->email }}</b></strong></p>
            <p class="card-text"><strong><b> STATUS          -->    {{ $skill_student->students->status }}</b></strong></p>
            <p class="card-text"><strong><b> DEPARTMENT      -->    {{ $skill_student->students->departments->name }}</b></strong></p>
            <p class="card-text"><strong><b> SKILL COURSE    -->    {{ $skill_student->skill_courses->skill_courses->name }}</b></strong></p>


            <pre>
        </div>
        </div>
    </div>
</div>
@endsection
