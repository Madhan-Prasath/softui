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
                    <h4><b>NEW SEMESTER</b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('semesters.index') }}" method="POST" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                            <label for=""><b>Semester</b></label><br><br>
                            <input type="text" name="semester" class="form-control" placeholder="Enter Semester ..." required>
                        </div>
                        @if($errors->has('semester'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Already Semester Exist</u></b></label></div>
                        @endif <br>

                            <button type="submit" class="btn btn-primary">Save Semester</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
