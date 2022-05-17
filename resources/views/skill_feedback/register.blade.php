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
                    <h4><b> NEW SKILL STUDENT </b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('skill_students.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf


                        <div class="form-group mb-3">
                        <label for=""><b>SKILL STUDENT</b></label><br>
                        <select class="form-control"  name="student_id" id="student_id" required>
                        <option value="{{$students->id}}"> {{$students->name}} -{{$students->rollno}} </option>
                        </select></div>
                        @if($errors->has('student_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Skill Course Name </u></b></label></div>
                        @endif

                        <div class="form-group mb-3">
                        <label for="">SKILL COURSE</label><br>
                        <select class="form-control"  name="skill_courses_id" id="skill_courses_id" required>
                        <option value="">Select Skill Course</option>
                        @foreach ($skill_courses ?? '' as $skill_course)
                        <option value="{{ $skill_course->id }}">{{ $skill_course->name }} - {{ $skill_course->code }}</option>
                        @endforeach
                        </select></div>
                        @if($errors->has('skill_courses_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Skill Course </u></b></label></div>
                        @endif

                    
                        <div class="form-group mb-3">
                        <label for="">SKILL FACULTY</label><br>
	                    <select class="form-control"  name="skill_faculty_id" id="skill_faculty_id" required>
                        <option value="">Select Skill Faculty</option>
                        @foreach ($skill_faculties?? '' as $skill_faculty)
                        <option value="{{ $skill_faculty->id }}">{{ $skill_faculty->faculties->name }} - {{ $skill_faculty->faculties->facultyid }} - {{ $skill_faculty->skill_courses->name }}</option>
                        @endforeach
                        </select></div>
                        @if($errors->has('skill_faculty'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Skill  </u></b></label></div>
                        @endif



                        <div class="form-group mb-3">
                        <label>STUDENT STATUS</label><br>
                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Skill Student Status</u></b></label></div>
                        @endif <br><br>


                        <div class="form-group mb-3">
                            <button type="submit"  class="btn btn-primary">Save Skill Student</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
    $('#skill_faculty_id').select2();
    $('#skill_courses_id').select2();
    $('#student_id').select2();

</script>
@endsection



