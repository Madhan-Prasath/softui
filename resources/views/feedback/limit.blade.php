@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card"><br><br>
                    <div class="card-header">  <h4><b><center>MENTORS FEEDBACK </center> </b></h4></div>
                    <div class="card-body">

                      <strong><center>Hi    {{ (auth()->user()->name) }} ! You have already rated. Limit Exceeded  </center> </strong>

                </div>
            </div>
        </div>
    </div>
@endsection