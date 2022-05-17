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
                    <h4><b><center>NEW MENTOR</center></b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('mentors.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf


                        <select class="form-control select2"  name="student_id" id="student_id" required >
                        <option value="">Select Student ID</option>
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}" >{{ $student->name }} - {{$student->departments->name }} - {{$student->rollno}} - {{$student->academic_years->academic_year }}</option>
                        @endforeach
                        </select>
                        @if($errors->has('student_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Student Already mapped with Mentor</u></b></label></div>
                        @endif <br><br>


                        <select class="form-control select2"  name="faculty_id" id="faculty_id" >
                        <option value="">Select Faculty</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" >{{ $faculty->name }} - {{$faculty->facultyid}} - {{$faculty->departments->name}} </option>
                        @endforeach
                        </select>
                        @if($errors->has('faculty_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Faculy</u></b></label></div>
                        @endif <br><br>

                        <select class="form-control" aria-label="Default select example"  name="mentor_status" id="mentor_status" required>
                        <option selected>Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select>
                        @if($errors->has('mentor_status'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Mentor Status </u></b></label></div>
                        @endif <br>



                        <br>
                        <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Save Mentor</button>
                        </div>

                    </form>

                    </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('.select2').select2();

    $("#input-id").rating();

</script>

@endsection
