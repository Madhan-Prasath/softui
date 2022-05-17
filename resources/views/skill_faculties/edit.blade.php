@extends('layouts.user_type.auth')

@section('content')




<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">

<br>
<div class="card">
  <div class="card-header"><h4><b><center>SKILL FACULTY </center></b></h4></div>
  <div class="card-body">

      <form action="{{  url('skill_faculties/' .$skill_faculty->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")


        <input type="hidden" name="id" id="id" value="{{$skill_faculty->id}}" id="id" >

        <div class="form-group mb-3">
        <label><strong><b>SKILL FACULTY</strong></b></label><br><br>
        <select class="form-control select2"  name="faculty_id" id="faculty_id" >
        <option value="">Select Faculty</option>
        @foreach ($faculties ?? '' as $faculty)
        <option value="{{ $faculty->id }}" {{$skill_faculty->faculty_id==$faculty->id ? 'selected' : ''}}>{{ $faculty->name }} - {{$faculty->facultyid}} - {{$faculty->departments->name}}</option>
        @endforeach
        </select>
        @if($errors->has('faculty_id'))
        <div class="error"><br><label style="background-color:#25F9DC">  &#8226; Select Faculty </label></div>
        @endif <br><br><br>


        <div class="form-group mb-3">
        <label><b><strong>SKILL COURSE</strong></b></label><br>
        <select class="form-control select2"   name="skill_courses_id" id="skill_courses_id" >
        <option value="">Select Course</option>
        @foreach ($skill_courses  as $skill_course)
        <option value="{{ $skill_course->id }}" {{$skill_faculty->skill_courses_id==$skill_course->id ? 'selected' : ''}}>{{ $skill_course->name }}</option>
        @endforeach
        </select></div>
        @if($errors->has('skill_courses_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Department</u></b></label></div>
        @endif <br>



        <div class="form-group mb-3">
        <label><strong><b>FACULTY STATUS</strong></b></label><br>
        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
        <option value="">Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('status'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Skill Faculty Status </u></b></label></div>
        @endif <br>


        <div class="form-group mb-3">
        <label for="example-datetime-local-input" class="form-control-label">Start Date</label>
        <input type="datetime-local" id="startdate" class="form-control"   name="startdate" value="{{$skill_faculty->startdate}}" required>
        </div> <br>

        <div class="form-group mb-3">
        <label for="example-datetime-local-input" class="form-control-label">End Date</label>
        <input type="datetime-local" id="enddate" class="form-control"  name="enddate" value="{{$skill_faculty->enddate}}" required>
        </div> <br>




        <input type="submit" value="Update" class="btn btn-success"><br>

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
