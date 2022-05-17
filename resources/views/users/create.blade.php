@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4> <b> NEW USER </b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('users.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group has-danger">
                        <label for=""><b>Name</b></label><br><br>
                        <input type="text" name="name" class="form-control is-invalid" placeholder="Enter Name..." required>
                        </div>

                         @if($errors->has('name'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Name </u></b></label></div>
                        @endif <br>

                        <div class="form-group mb-3">
                        <label for=""><b>Email</b></label><br><br>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email..." required>
                        </div>

                         @if($errors->has('email'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Email </u></b></label></div>
                        @endif <br>


                        <div class="form-group mb-3">
                        <label><strong><b>Role</strong></b></label><br><br>
                        <select class="form-control" aria-label="Default select example"  name="roles" id="roles" required>
                        <option value="">Select Role</option>
                        @foreach ($roles ?? '' as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        </select>

                         @if($errors->has('roles'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Roless </u></b></label></div>
                        @endif <br>

                        <label for=""><b>Password</b></label><br><br>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password..." required>
                        </div>

                        @if($errors->has('password'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b> Password Mismatch </u></b></label></div>
                        @endif <br>

                        <label for=""><b>Confirm Password</b></label><br><br>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password..." required >
                        </div>

                         @if($errors->has('password_confirmation'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Confirm Password </u></b></label></div>
                        @endif <br>

                        @if($errors->has('password_confirmation'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b> Password Mismatch </u></b></label></div>
                        @endif <br>

                        <button type="submit" class="btn btn-primary">Save User</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
