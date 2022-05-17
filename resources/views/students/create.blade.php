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
                    <h4><b> NEW STUDENT </b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('students.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated" >
                        @csrf

                        <div class="mb-3 mt-3">
                        <input type="text" name="name" class="form-control" placeholder="Enter Student Name..." required >
                        </div>
                        @if($errors->has('name'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Enter Student Name</u></b></lable></div>
                        @endif <br>


                        <div class="mb-3 mt-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter Student Email..." required>
                        </div>
                        @if($errors->has('email'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Invalid Email or Exist Email</u></b></lable></div>
                        @endif <br>

                        <div class="mb-3 mt-3">
                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select></div>
                        @if($errors->has('status'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Status </u></b></lable></div>
                        @endif <br>


                        <div class="mb-3 mt-3">
                        <input type="text" name="rollno" class="form-control" placeholder="Enter Student RollNO..." required >
                        </div>
                        @if($errors->has('rollno'))
                        <div class="error"></div>
                        @endif <br>


                        <div class="mb-3 mt-3">
	                    <select class="form-control" name="department_id" id="department_id" required>
                        <option value="">Select Department</option>
                        @foreach ($departments ?? '' as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                        </select></div>
                        @if($errors->has('department_id'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Department</u></b></lable></div>
                        @endif

                        <br>

                        <div class="mb-3 mt-3">
                        <select class="form-control" name="batch_id" id="batch_id" required>
                        <option value="">Select Batch</option>
                         @foreach ($batches ?? '' as $batch)
                         <option value="{{ $batch->id }}">{{ $batch->batch }}</option>
                         @endforeach
                         </select></div>
                         @if($errors->has('batch_id'))
                         <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Batch</u></b></lable></div>
                        @endif
                        <br>

                        <div class="mb-3 mt-3">
                        <select class="form-control" name="semester_id" id="semester_id" required >
                        <option value="">Select Semester</option>
                         @foreach ($semesters ?? '' as $semester)
                         <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                         @endforeach
                         </select></div>
                         @if($errors->has('semester_id'))
                         <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Semester</u></b></lable></div>
                        @endif
                        <br>

                        <div class="mb-3 mt-3">
                        <select class="form-control" name="academic_year_id" id="academic_year_id" required >
                        <option value="">Select Academic Year</option>
                         @foreach ($academic_years ?? '' as $academic_year)
                         <option value="{{ $academic_year->id }}">{{ $academic_year->academic_year }}</option>
                         @endforeach
                         </select></div>
                         @if($errors->has('academic_year_id'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <u><b>Select Academic Year</u></b></lable></div>
                        @endif
                        <br>

                        <div class="form-group has-danger">
                            <button type="submit" class="btn btn-primary">Save Student</button>
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
