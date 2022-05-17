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
                    <h4><b>New Batch</b></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('batches.index') }}" method="POST" style="background-color:#F8F9F8" class="was-validated">
                        @csrf


                        <div class="form-group mb-3">
                            <label for="">Batch</label><br><br>
                            <input type="text" name="batch" class="form-control" placeholder="Enter Batch ..." required>
                        </div>


                        @if($errors->has('batch'))
                        <div class="error"><br><label style="color:red" >  &#8226; <u><b> Batch Already Exist </u></b></label></div>
                        @endif <br>

                        <button type="submit" class="btn btn-primary">Save Batch</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
