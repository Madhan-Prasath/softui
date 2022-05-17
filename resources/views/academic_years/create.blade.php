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
                    <h4><b>NEW ACADEMIC YEAR</b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('academic_years.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Academic Year</label><br><br>
                            <input type="text" name="academic_year" class="form-control" placeholder="Enter Academic Year..." required>
                        </div>

                        @if($errors->has('academic_year'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Academic Year Already Exist </u></b></label></div>
                        @endif <br>

                            <button type="submit" class="btn btn-primary">Save Academic Year</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
