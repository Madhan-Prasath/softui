@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <br><br><br><br><br><br>
            <div class="card">
                <div class="card-header">
                    <h4><b>NEW DESIGNATION </b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('designations.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                            <label for=""><b>Designations </b></label><br><br>
                            <input type="text" name="designation" class="form-control" placeholder="Enter Designation..." required>
                        </div>
                        @if($errors->has('designation'))
                        <div class="error"><lable style="background-color:#25F9DC">  &#8226; Alreaday Designation Exist</lable></div>
                        @endif <br>

                            <button type="submit" class="btn btn-primary">Save Designation</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
