@extends('layouts.user_type.auth')

@section('content')
)
<div class="fullscreen">
  <div class="row justify-content-center">
  <div class="col-md-12">

    <br><br><br>
    <div class="card">
  <div class="card-header"><h4><b>DESIGNATIONS </b></h4></div>
  <div class="card-body">

      <form action="{{  url('designations/' .$designations->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")


        <input type="hidden" name="id" id="id" value="{{$designations->id}}" id="id" >
        <label style="font-size:15px"><b>Designation</b></label><br><br>
        <b><input type="text" name="designation" id="designation" class="form-control" font="bold" value="{{$designations->designation}}" id="designations" placeholder="Enter designation..." required><br><br>
        @if($errors->has('designation'))
        <div class="error"><lable style="background-color:#25F9DC">  &#8226; Alreaday Designation  Exist </lable></div>
        @endif <br>


        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
</div>
</div>
</div>

@endsection
