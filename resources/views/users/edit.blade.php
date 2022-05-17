@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
 <div class="row justify-content-center">
  <div class="col-md-12">
    
    <div class="card">
    <div class="card-header"><h4><b><center>USERS - EDIT</center></b></h4></div>
     <div class="card-body">


        <form action="{{  url('users/' .$user->id)  }}" method="post" style="background-color:#F8F9F8" class="was-validated">
        {!! csrf_field() !!}
        @method("PUT")

           <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" >
           <label><b>Users</b></label>
           <b><input type="text" name="name" id="name" class="form-control" font="bold" value="{{$user->name}}" placeholder="Enter Valid User Name..." required>

            @if($errors->has('name'))
            <div class="error"><br><lable style="color:red" >  &#8226; <u><b>User Already Exist </u></b></lable></div>
            @endif 

            <div class="form-group mb-3">
            <label for=""><b>Email</b></label><br>
            <input type="email" name="email" class="form-control" value="{{$user->email}}"placeholder="Enter Valid Email..." required>
            </div>

             @if($errors->has('email'))
            <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Email </u></b></label></div>
            @endif 


            <div class="form-group mb-3">
            <label><strong><b>Role</strong></b></label><br>
            <select class="form-control" aria-label="Default select example" value="{{$user->roles}}" name="roles" id="roles" required>
            <option value="">Select Role</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{$user->role_id==$role->id ? 'selected' : ''}}>{{$role->name}}</option>
            @endforeach
            </select>


             @if($errors->has('roles'))
            <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Roless </u></b></label></div>
            @endif 

            <label for=""><b>Password</b></label><br>
            <input type="password" name="password" class="form-control" placeholder="Enter Password..." required>
            </div>

            @if($errors->has('password'))
            <div class="error"><br><label style="color:red" >  &#8226; <u><b> Password Mismatch </u></b></label></div>
            @endif 

            <label for=""><b>Confirm Password</b></label><br>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password..." required >
            </div>

             @if($errors->has('password_confirmation'))
            <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Confirm Password </u></b></label></div>
            @endif 

            @if($errors->has('password_confirmation'))
            <div class="error"><br><label style="color:red" >  &#8226; <u><b> Password Mismatch </u></b></label></div>
            @endif  

        <input type="submit" value="Update" class="btn btn-success"><br>
        </form>
    </div>
    </div>
   </div>
  </div>
</div>

@endsection