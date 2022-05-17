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
                    <h4> <b> NEW SKILL </b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('skills.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                            <label for=""><b>SKILLS TYPE</b></label><br><br>
                            <input type="text" name="name" class="form-control" placeholder="Enter Skill Type..." required>
                        </div>

                         @if($errors->has('name'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Skill Type Already Exist </u></b></lable></div>
                        @endif <br>


                        <div class="form-group mb-3">
                        <label><strong><b>SKILL STATUS</strong></b></label><br><br>
                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select>

                         @if($errors->has('status'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Skill Status </u></b></lable></div>
                        @endif <br>




                        <button type="submit" class="btn btn-primary">Save Skill</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
