@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
  <div class="row justify-content-center">
  <div class="col-md-12">

    <br><br><br>
    <div class="card">
  <div class="card-header"><h4><b>SEMESTERS</b></h4></div>
  <div class="card-body">

      <form action="{{  url('semesters/' .$semesters->id)  }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")

        <input type="hidden" name="id" id="id" value="{{$semesters->id}}" id="id" >
        <label><b>batch</b></label>
        <b><input type="text" name="semester" class="form-control"  id="semester" font="bold" value="{{$semesters->semester}}" id="semesters" placeholder="Enter semester..." required><br><br>
        @if($errors->has('semester'))
        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Already Semester Exist</u></b></label></div>
        @endif <br>

        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
  </div>
</div>
</div>
</div>
</div>

@endsection
