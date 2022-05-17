@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
  <div class="card-header"><h4><b><center>{{ $faculty->name }}  -  STUDENTS </b> </center></h4></div>
  <div class="card-body">
     <div class="table-responsive">
         <table class="table align-items-center " id="myTable">
            <thead class="t" align="center">
                <tr>
                <th>#</th>
                <th>STUDENT NAME</th>
                <th>STUDENT EMAIL</th>
                <th>ROLLNO</th>
                <th>BATCH</th>
                <th>ACADEMIC YEAR</th>
                <th>STATUS</th>
                <th>SEMESTER</th>
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
