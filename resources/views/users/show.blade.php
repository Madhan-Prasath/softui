@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card"> <br><br>
  <div class="card-header"><h4><b><center>{{ $user->name }}  -  DETAILS </center></b> </h4></div>
  <div class="card-body">
     <div class="table-responsive">
         <table class="table align-items-center " id="myTable" >
            <thead class="" align="center">
                <tr>
                <th>#</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                </tr>
            </thead>
            <tbody align="center">
             
                <tr>
                <td>{{ 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $role }}</td>
                </tr>
            
            </tbody>
          </table>
       </div>
  </div>
  </hr>
  </div>
</div>
@endsection