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
            <br>
            <div class="card">
                <div class="card-header">
                    <h4><b>NEW FACULTY</b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('faculties.done') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf

                        <div class="form-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Enter Faculty Name..." required >
                        </div>
                        @if($errors->has('name'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Enter Faculty Name </u></b></label></div>
                        @endif <br>


                        <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter Faculty Email..." required>
                        </div>
                        @if($errors->has('email'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Email Already Existed </u></b></label></div>
                        @endif <br>



                        <select class="form-control" aria-label="Default select example"  name="status" id="status" required>
                        <option value="">Select Status</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Status </u></b></label></div>
                        @endif <br>

                        <div class="form-group mb-3">
                        <input type="text" name="facultyid" class="form-control" placeholder="Enter Faculty ID..." required>
                        </div>
                        @if($errors->has('facultyid'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Facuty ID Already Existed </u></b></label></div>
                        @endif <br>


                        <div class="form-group mb-3">
	                    <select class="form-control select2"  name="department_id" id="department_id" required>
                        <option value="">Select Department</option>
                        @foreach ($departments ?? '' as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                        </select></div>
                        @if($errors->has('department_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Department </u></b></label></div>
                        @endif <br>



                        <div class="form-group mb-3">
                        <select class="form-control select2" name="designation_id" id="designation_id" required>
                        <option value="">Select Designation</option>
                         @foreach ($designations ?? '' as $designation)
                         <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                         @endforeach
                         </select></div>
                         @if($errors->has('designation_id'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b>Select Designation </u></b></label></div>
                        @endif <br>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Faculty</button>
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
