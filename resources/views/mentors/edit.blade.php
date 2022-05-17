@extends('layouts.user_type.auth')

@section('content')




<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">


<div class="card">
  <div class="card-header"><h4><b><center>MENTORS</center> </b></h4></div>
  <div class="card-body">

      <form action="{{  url('mentors/' .$mentor->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")



        <label><b><strong>STUDENT</strong></b></label><br><br>
        <select class="form-control select2"  name="student_id" id="student_id" >
        <option value="">Select Student</option>
        @foreach ($students  as $student)
        <option value="{{ $student->id }}" {{$mentor->student_id==$student->id ? 'selected' : ''}}>{{ $student->name }}- {{$student->departments->name }} - {{$student->rollno}} - {{$student->academic_years->academic_year}}</option>
        @endforeach
        </select>
        @if($errors->has('student_id'))
        <div class="error"><br><label style="background-color:#25F9DC">  &#8226; Select Student </label></div>
        @endif <br><br><br>


        <label><strong><b>FACULTY</strong></b></label><br><br>
        <select class="form-control select2"  name="faculty_id" id="faculty_id"  >
        <option value="">Select Faculty</option>
        @foreach ($faculties ?? '' as $faculty)
        <option value="{{ $faculty->id }}" {{$mentor->faculty_id==$faculty->id ? 'selected' : ''}}>{{ $faculty->name }} - {{$faculty->facultyid}} - {{$faculty->departments->name}}</option>
        @endforeach
        </select>
        @if($errors->has('faculty_id'))
        <div class="error"><br><label style="background-color:#25F9DC">  &#8226; Select Faculty </label></div>
        @endif <br><br><br>

        <label><strong><b>STATUS</strong></b></label><br><br>
        <select class="form-control" aria-label="Default select example"  name="mentor_status" id="mentor_status" required>
        <option value="">Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('mentor_status'))
        <div class="error"><br><label style="background-color:#25F9DC">  &#8226; Select Status</label></div>
        @endif <br>


        <input type="submit" value="Update" class="btn btn-success"><br>

    </div>
</div>
</div>
</div>
</div>
<script>
$('.select2').select2();
</script>
@endsection
