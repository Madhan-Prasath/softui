@extends('layouts.user_type.auth')

@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">


<div class="card">
  <div class="card-header"><h4><b><center>SKILL STUDENT </center></b></h4></div>
  <div class="card-body">

      <form action="{{  url('skill_students/' .$skill_student->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")


        <input type="hidden" name="id" id="id" value="{{$skill_student->id}}" id="id" >

        <div class="form-group mb-3">
        <label>SKILL STUDENT</label><br>
        <select class="form-control select2"  name="student_id" id="student_id" >
        <option value="">Select Student</option>
        @foreach ($students ?? '' as $student)
        <option value="{{ $student->id }}" {{$skill_student->student_id==$student->id ? 'selected' : ''}}>{{ $student->name }} - {{$student->rollno}} - {{$student->departments->name}}</option>
        @endforeach
        </select>
        @if($errors->has('student_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Student</u></b></label></div>
        @endif <br><br><br>


        <div class="form-group mb-3">
        <label>SKILL Faculty</label><br>
        <select class="form-control select2"  name="skill_faculty_id" id="skill_faculty_id" >
        <option value="">Select Faculty</option>
        @foreach ($skill_faculties ?? '' as $skill_faculty)
        <option value="{{ $skill_faculty->id }}" {{$skill_student->faculty_id==$skill_faculty->id ? 'selected' : ''}}>{{ $skill_faculty->faculties->name }} - {{$skill_faculty->faculties->facultyid}} - {{$skill_faculty->faculties->departments->name}}</option>
        @endforeach
        </select>
        @if($errors->has('skill_faculty_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Faculty</u></b></label></div>
        @endif <br><br><br>


        <div class="form-group mb-3">
        <label>SKILL COURSE</label><br>
        <select class="form-control select2"   name="skill_courses_id" id="skill_courses_id" >
        <option value="">Select Course</option>
        @foreach ($skill_courses  as $skill_course)
        <option value="{{ $skill_course->id }}" {{$skill_student->skill_courses_id==$skill_course->id ? 'selected' : ''}}>{{ $skill_course->name }}</option>
        @endforeach
        </select></div>
        @if($errors->has('skill_courses_id'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Course</u></b></lable></div>
        @endif <br>



        <div class="form-group mb-3">
        <label>STUDENT STATUS</label><br>
        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
        <option value="">Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('status'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Skill Faculty Status </u></b></lable></div>
        @endif <br>




        <input type="submit" value="Update" class="btn btn-success"></br>

    </form>

  </div>
</div>
</div>
</div>
</div>
<script>
    $('.select2').select2();
</script>
@endsection
