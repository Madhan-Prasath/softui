@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card"><br><br>
                    <div class="card-header"> <strong> <h4><b><center>SKILL FACULTY FEEDBACK </center> </strong></b></h4></div>
                    <div class="card-body">

                      <strong><center>Hi    {{ (auth()->user()->name) }}... You are Already Rated . Limit Exceed  </center> </strong>

                </div>
            </div>
        </div>
    </div>
@endsection