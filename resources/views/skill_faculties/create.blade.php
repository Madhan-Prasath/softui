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
                    <h4><b><center> NEW SKILL FACULTY </center></b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('skill_faculties.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                        <label for=""><b>SKILL FACULTY</b></label><br>
                        <select class="form-control select2"  name="faculty_id" id="faculty_id" required >
                        <option value="">Select Faculty</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" >{{ $faculty->name }} - {{$faculty->facultyid}} - {{$faculty->departments->name}} </option>
                        @endforeach
                        </select></div>
                        @if($errors->has('faculty_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Faculty </u></b></label></div>
                        @endif <br>

                        <div class="form-group mb-3">
                        <label for=""><b>SKILL COURSE</b></label><br>
	                    <select class="form-control select2"  name="skill_courses_id" id="skill_courses_id" required >
                        <option value="">Select Skill Course</option>
                        @foreach ($skill_courses ?? '' as $skill_course)
                        <option value="{{ $skill_course->id }}">{{ $skill_course->name }}</option>
                        @endforeach
                        </select></div>
                        @if($errors->has('skill_courses_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Skill Course </u></b></label></div>
                        @endif <br>




                        <div class="form-group mb-3">
                        <label><strong><b>FACULTY STATUS</strong></b></label><br>
                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Faculty Status</u></b></label></div>
                        @endif <br>


                        <div class="form-group mb-3">
                        <label for="example-datetime-local-input" class="form-control-label">Start Date</label>
                        <input type="datetime-local" id="startdate" class="form-control"  name="startdate" required>
                        </div> <br>

                        <div class="form-group mb-3">
                        <label for="example-datetime-local-input" class="form-control-label">End Date</label>
                        <input type="datetime-local" id="enddate" class="form-control" name="enddate" required>
                        </div> <br>




                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Skill Faculty </button>
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
