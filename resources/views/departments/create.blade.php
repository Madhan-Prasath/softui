@extends('layouts.user_type.auth')
@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <br>
            <div class="card">
                <div class="card-header">
                    <h4> <b>NEW DEPARTMENT </b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('departments.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Department Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Department Name..." required>
                        </div>
                        @if($errors->has('name'))
                        <div class="error"><br><label style="color:red" >  &#8226; <b>Already Department Exist</b></label></div>
                        @endif


                        <div class="form-group mb-3">
                            <label for="">Department Code   </label>
                            <input type="text" name="code" class="form-control" placeholder="Enter Department Code..." required>
                        </div>
                        @if($errors->has('code'))
                        <div class="error"><br><label style="color:red" >  &#8226; <b>Already Department Code Exist</b></label></div>
                        @endif

                        <label for="status"><strong>Select Status</strong></label>
                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select><br>


                            <button type="submit" class="btn btn-primary">Save Deaprtment</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
