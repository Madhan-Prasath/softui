@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
 <div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
    <div class="card-header"><h4><b>ACADEMIC YEARS</b></h4></div>
     <div class="card-body">


        <form action="{{  url('academic_years/' .$academic_years->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")

        <input type="hidden" name="id" id="id" value="{{$academic_years->id}}" id="id" >
        <label><b>Academic Year</b></label>
        <b><input type="text" name="academic_year" id="academic_year" font="bold" value="{{$academic_years->academic_year}}" id="academic_year" placeholder="Enter Academic Year..." required><br><br>

        @if($errors->has('academic_year'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Academic Year Already Exist </u></b></label></div>
        @endif <br>

        <input type="submit" value="Update" class="btn btn-success"><br>
        </form>
    </div>
    </div>
   </div>
  </div>
</div>

@endsection
