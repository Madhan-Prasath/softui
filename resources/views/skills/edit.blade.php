@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
 <div class="row justify-content-center">
  <div class="col-md-12">

    <br><br><br>
    <div class="card">
    <div class="card-header"><h4><b>SKILLS</b></h4></div>
     <div class="card-body">


        <form action="{{  url('skills/' .$skills->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")

        <input type="hidden" name="id" id="id" value="{{$skills->id}}" id="id" >
        <label><b>Skills</b></label>
        <b><input type="text" name="name" id="name" font="bold" value="{{$skills->name}}" placeholder="Enter Skill Type..." required><br><br>

        @if($errors->has('name'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Skill Type Already Exist </u></b></lable></div>
        @endif <br>


        <div class="form-group mb-3">
        <label><strong><b>SKILL STATUS</strong></b></label><br><br>
        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
        <option value="">Select Status</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
        </select>
        @if($errors->has('status'))
        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Skill Status  </u></b></lable></div>
        @endif <br>

        <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
    </div>
   </div>
  </div>
</div>

@endsection
