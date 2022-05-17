@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card-header"><b><h4><center>{{ $student->name }}  -  {{$student->rollno }}</center></h4></b></div><br><br>
            <div class="card-body">

              <pre> <p class="card-text"><strong><b> NAME           -->    {{ $student->name }}</b></strong></p>
                    <p class="card-text"><strong><b> ROLLNO         -->    {{ $student->rollno }}</b></strong></p>
                    <p class="card-text"><strong><b> EMAIL          -->    {{ $student->email }}</b></strong></p>
                    <p class="card-text"><strong><b> STATUS         -->    {{ $student->status }}</b></strong></p>
                    <p class="card-text"><strong><b> DEPARTMENT     -->    {{ $student->departments->name }}</b></strong></p>
                    <p class="card-text"><strong><b> SEMESTER       -->    {{ $student->semesters->semester }}</b></strong></p>
                    <p class="card-text"><strong><b> BATCH          -->    {{ $student->batches->batch }}</b></strong></p>
                    <p class="card-text"><strong><b> ACADEMIC YEAR  -->    {{ $student->academic_years->academic_year }}</b></strong></p>
                    <p class="card-text"><strong><b> MENTOR         -->    {{ $mentor->name }}</b></strong></p>
              <pre>

             </div>
           </div>
        </div>
    </div>
</div>
@endsection
