@extends('layouts.user_type.auth')
@section('content')


<div class="fullscreen">
<div class="row justify-content-center">
<div class="col-md-12">


<div class="card">
  <div class="card-header"><h4><b>DEPARTMENTS</b></h4></div>
  <div class="card-body">

      @csrf
      <form action="{{  url('departments/' .$departments->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated" style="font-size:15px">
        @method("PUT")


        <input type="hidden" name="id" id="id" value="{{$departments->id}}" id="id" >

        <label><b>Department Name</b></label><br><br>
        <b><input type="text" name="name" id="name" font="bold" value="{{$departments->name}}" class="form-control"  placeholder="Enter Department Name..." required><br><br>
        @if($errors->has('name'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b> Department Alreay Exist </u></b></label></div>
        @endif


        <label><b>Department Code</b></label><br><br>
        <b><input type="text" name="code" id="code" value="{{$departments->code}}" class="form-control"  placeholder="Enter Department Code..." required></b><br><br>
        @if($errors->has('code'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b> Department Code Exist </u></b></label></div>
         @endif


         <label for="status"><strong>Select Status</strong></label><br><br>
         <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
         <option selected>Select Status</option>
         <option value="ACTIVE">ACTIVE</option>
         <option value="INACTIVE">INACTIVE</option>
         </select> <br><br>

        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
  </div>
</div>
</div>
</div>
</div>

@endsection
