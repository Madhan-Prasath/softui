@extends('layouts.user_type.auth')

@section('content')

<head> <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> </head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">

<br><br><br>
<div class="card">
  <div class="card-header"><h4><b>{{$student->name}} - {{$student->rollno}}</b></h4></div>
  <div class="card-body">

      <form action="{{  url('students/' .$student->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")


        <input type="hidden" class="form-control"  name="id" id="id" value="{{$student->id}} "  >


        <div class="form-group mb-3">
        <label><b><strong>NAME</strong></b></label>
        <input type="text" name="name" class="form-control"  id="name" value="{{$student->name}}" id="name" placeholder="Enter Student Name..."  ><br></div>
        @if($errors->has('name'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Student Name</u></b></label></div>
        @endif


        <div class="form-group mb-3">
        <label><b><strong>EMAIL</strong></b></label><br>
        <input type="email" name="email"  value="{{$student->email}}"  class="form-control"id="email" placeholder="Enter Student Email..."  ><br><div>
        @if($errors->has('email'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Student Email</u></b></label></div>
        @endif


        <div class="form-group mb-3">
        <label><strong><b> STATUS</strong></b></label><br>
        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
        <option value="">Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('status'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Student Status</u></b></label></div>
        @endif<br>


        <div class="form-group mb-3">
        <label><b><strong>ROLLNO</strong></b></label><br>
        <input type="text" class="form-control"  name="rollno" id="rollno" value="{{$student->rollno}}" id="rollno" placeholder="Enter Student  Roll No..." ><br></div>
        @if($errors->has('rollno'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Roll NO</u></b></label></div>
        @endif


        <div class="form-group mb-3">
        <label><b><strong>DEPARTMENT</strong></b></label><br>
        <select class="form-control select2"   name="department_id" id="department_id" >
        <option value="">Select Department</option>
        @foreach ($departments  as $department)
        <option value="{{ $department->id }}" {{$student->department_id==$department->id ? 'selected' : ''}}>{{ $department->name }}</option>
        @endforeach
        </select></div>
        @if($errors->has('department_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Department</u></b></label></div>
        @endif


        <div class="form-group mb-3">
        <label><b><strong>SEMESTER</strong></b></label><br>
        <select class="form-control select2"  name="semester_id" id="semester_id" >
        <option value="">Select Semester</option>
        @foreach ($semesters ?? '' as $semester)
        <option value="{{ $semester->id }}" {{$student->semester_id==$semester->id ? 'selected' : ''}}>{{ $semester->semester }}</option>
        @endforeach
        </select></div>
        @if($errors->has('semester_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Semester</u></b></label></div>
        @endif


        <div class="form-group mb-3">
        <label><b><strong>ACADEMIC YEAR</strong></b></label><br>
        <select class="form-control select2"  name="academic_year_id" id="academic_year_id" >
        <option value="">Select Academic Year</option>
        @foreach ($academic_years ?? '' as $academic_year)
        <option value="{{ $academic_year->id }}" {{$student->academic_year_id==$academic_year->id ? 'selected' : ''}}>{{ $academic_year->academic_year }}</option>
        @endforeach
        </select></div>
        @if($errors->has('academic_year_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Academic Year</u></b></label></div>
        @endif



        <div class="form-group mb-3">
        <label><b><strong>BATCH</strong></b></label><br>
        <select class="form-control select2"  name="batch_id" id="batch_id" >
        <option value="">Select Batch</option>
        @foreach ($batches ?? '' as $batch)
        <option value="{{ $batch->id }}" {{$student->batch_id==$batch->id ? 'selected' : ''}}>{{ $batch->batch }}</option>
        @endforeach
        </select></div>
        @if($errors->has('batch_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Batch</u></b></label></div>
        @endif <br>

        <input type="submit" value="Update" class="btn btn-success">

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



