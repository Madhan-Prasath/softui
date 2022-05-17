@extends('layouts.user_type.auth')

@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4><b><center>NEW SKILL COURSE </center></b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('skill_courses.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                        <label for=""><b>SKILLS COURSE NAME</b></label><br><br>
                        <input type="text" name="name" class="form-control" placeholder="Enter Skill Course Name ..." required >
                        </div>
                        @if($errors->has('name'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Skill Course Name </u></b></lable></div>
                        @endif <br>


                        <div class="form-group mb-3">
                        <label for=""><b>COURSE CODE</b></label><br><br>
                        <input type="text" name="code" class="form-control" placeholder="Enter Skill Course Status..." required>
                        </div>
                        @if($errors->has('code'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Skill Course Code Existed</u></b></lable></div>
                        @endif <br>



                        <div class="form-group mb-3">
                        <label><strong><b>COURSE STATUS</strong></b></label><br><br>
                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Skill Course Status </u></b></lable></div>
                        @endif <br>




                        <div class="form-group mb-3">
                        <label for=""><b>SKILL TYPE</b></label><br><br>
	                    <select class="form-control select2"  name="skill_id" id="skill_id" required>
                        <option value="">Select Skill Type</option>
                        @foreach ($skills ?? '' as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                        </select></div>
                        @if($errors->has('skill_id'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Skill Type </u></b></lable></div>
                        @endif <br>

                        <br><br>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Skill Course</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
</script>
@endsection
