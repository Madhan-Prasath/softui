@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
  <div class="row justify-content-center">
  <div class="col-md-12">
      <div class="card">
         <div class="card-header"><h4><b>BATCHES</b></h4></div>
           <div class="card-body">
              <br><br><br>
              <form action="{{  url('batches/' .$batches->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">

                {!! csrf_field() !!}
                @method("PUT")

                <div class="form-group mb-3">
                <input type="hidden" name="id" id="id" value="{{$batches->id}}" id="id" >
                <label style="font-size:15px"><b>Academic Year</b></label><br><br>
                <b><input type="text" name="batch"class="form-control" id="batch" font="bold" value="{{$batches->batch}}" id="batch" placeholder="Enter Batch..." required><br><br></div>
                @if($errors->has('batch'))
                <div class="error"><br><label style="color:red" >  &#8226; <u><b> Batch Already Exist </u></b></label></div>
                @endif <br>

                <input type="submit" value="Update" class="btn btn-success"></br>
              </form>
          </div>
      </div>
    </div>
 </div></div>
@endsection
