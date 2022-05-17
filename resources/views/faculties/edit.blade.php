@extends('layouts.user_type.auth')

@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">


<div class="card">
  <div class="card-header"><h4><b>FACULTIES </b></h4></div>
  <div class="card-body">

      <form action="{{  url('faculties/' .$faculty->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")


        <input type="hidden" name="id" id="id" value="{{$faculty->id}}" id="id" >

        <div class="form-group mb-3">
        <label><b>Name</b></label><br>
        <input type="text" name="name" id="name" value="{{$faculty->name}}" class="form-control"  placeholder="Enter Faculty Name..." required>
        </div>
        @if($errors->has('name'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Faculty Name </u></b></label></div>
        @endif <br>


        <div class="form-group mb-3">
        <label><b>Email</b></label><br>
        <input type="email" name="email" id="email" value="{{$faculty->email}}" class="form-control"  placeholder="Enter Faculty email..." required></div>
        @if($errors->has('email'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Email Already Existed </u></b></label></div>
        @endif <br>


        <label><b>Status</b></label><br>
        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
        <option selected>Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('status'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Status </u></b></label></div>
        @endif <br>


        <div class="form-group mb-3">
        <label><b>Faculty ID</b></label><br>
        <input type="text" name="facultyid" id="facultyid" value="{{$faculty->facultyid}}" class="form-control"  placeholder="Enter Faculty ID..." required></div>
        @if($errors->has('facultyid'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Facuty ID Already Existed </u></b></label></div>
        @endif <br>


        <div class="form-group mb-3">
        <label><b>Department</b></label><br>
        <select class="form-control select2"  name="department_id" id="department_id" required>
        <option value="">Select Department</option>
        @foreach ($departments  as $department)
        <option value="{{ $department->id }}" {{$faculty->department_id==$department->id ? 'selected' : ''}}>{{ $department->name }}</option>
        @endforeach
        </select></div>
        @if($errors->has('department_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Department </u></b></label></div>
        @endif <br>




        <div class="form-group mb-3">
        <label><b>Designation</b></label><br>
        <select class="form-control select2" name="designation_id" id="designation_id" required >
        <option value="">Select Designation</option>
        @foreach ($designations ?? '' as $designation)
        <option value="{{ $designation->id }}" {{$faculty->designation_id==$designation->id ? 'selected' : ''}}>{{ $designation->designation }}</option>
        @endforeach
        </select></div>
        @if($errors->has('designation_id'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Designation </u></b></label></div>
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
