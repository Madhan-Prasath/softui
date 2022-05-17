@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card"> <br><br>
  <div class="card-header"><h4><b> -  STUDENTS </b> </h4></div>
  <div class="card-body">
     <div class="table-responsive">
         <table class="table align-items-center table-light">
            <thead class="thead-light" align="center">
                <tr>
                <th>#</th>
                <th><h5>Student Name</h5></th>
                <th><h5>Student Email</h5></th>
                <th><h5>Student RollNo</h5></th>
                <th><h5>Batch</h5></th>
                <th><h5>Academic Year</h5></th>
                <th><h5>Status</h5></th>
                <th><h5>Semester</h5></th>
                </tr>
            </thead>
            <tbody align="center">
                @foreach($students ?? '' as $student)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->students->name}}</td>
                <td>{{ $student->students->email}}</td>
                <td>{{ $student->students->rollno}}</td>
                <td>{{ $student->students->batches->batch}}</td>
                <td>{{ $student->students->academic_years->academic_year}}</td>
                <td>{{ $student->students->status}}</td>
                <td>{{ $student->students->semesters->semester}}</td>
                </tr>

                @endforeach
            </tbody>
          </table>
       </div>
  </div>
  </hr>
  </div>
</div>
<script src="{{ asset('assets/js/datatable2.min.js') }}"> </script>
<script src="{{ asset('assets/js/datatable1.min.js') }}"> </script>
<script>
$(document).ready( function () {
$('#myTable').DataTable();
} );
</script>
<style>
    .dataTables_length > label
   {
       font-size: 1.2rem;
   }
  .dataTables_filter > label {
       font-size: 1.2rem;
}

</style>
@endsection
