@extends('layouts.user_type.auth')

@section('content')



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">

<br>
<div class="card">
  <div class="card-header"><h4><b>SKILL COURSE </b></h4></div>
  <div class="card-body">

      <form action="{{  url('skill_courses/' .$skill_course->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")


        <input type="hidden" name="id" id="id" value="{{$skill_course->id}}" id="id" >

        <div class="form-group mb-3">
        <label><b>Course Name</b></label><br>
        <input type="text" name="name" id="name" value="{{$skill_course->name}}" class="form-control"  placeholder="Enter Skill Course Name..." required><br>
        </div>
        @if($errors->has('name'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b> Skill Course Already Existed </u></b></lable></div>
        @endif <br>


        <div class="form-group mb-3">
        <label><b>Course Code</b></label><br>
        <input type="type" name="code" id="code" value="{{$skill_course->code}}" class="form-control"  placeholder="Enter  Skill Course Code..." required><br></div>
        @if($errors->has('code'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Skill Course Code  Already Existed </u></b></lable></div>
        @endif <br>


        <div class="form-group mb-3">
        <label><strong><b>Course Status</strong></b></label><br><br>
        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
        <option value="">Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('status'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Faculty Status </u></b></lable></div>
        @endif <br>




        <div class="form-group mb-3">
        <label><b>Skill Course Type</b></label><br><br>
        <select class="form-control" aria-label="Default select example"  name="skill_id" id="skill_id" >
        <option value="">Select  Skill Course Type </option>
        @foreach ($skills  as $skill)
        <option value="{{ $skill->id }}" {{$skill_course->skill_id==$skill->id ? 'selected' : ''}}>{{ $skill->name }}</option>
        @endforeach
        </select></div>
        @if($errors->has('skill_id'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Skill Course Type </u></b></lable></div>
        @endif <br>

        <br>



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
