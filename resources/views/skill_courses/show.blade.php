@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card"> <br><br>
  <div class="card-header"><h4><b>{{ $skill_course->name }}  -  STUDENTS </b> </h4></div>
  <div class="card-body">
     <div class="table-responsive">
         <table class="table align-items-center " id="myTable" >
            <thead class="" align="center">
                <tr>
                <th>#</th>
                <th>SKILL STUDENT NAME</th>
                <th>SKILL STUDENT ROLLNO</th>
                <th>DEPARTMENT</th>
                <th>EMAIL</th>
                <th>SEMESTER</th>
                <th>SKILL FACULTY NAME</th>
                <th>ACADEMIC YEAR</th>
                <th>STATUS</th>

                </tr>
            </thead>
            <tbody align="center">
                @foreach($students ?? '' as $student)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->students->name. ' - ' . $student->students->rollno . ' - ' .$student->students->departments->code }}</td>
                <td>{{ $student->students->rollno }}</td>
                <td>{{ $student->students->departments->name }}</td>
                <td>{{ $student->students->email }}</td>
                <td>{{ $student->students->semesters->semester }}</td>
                <td>{{ $student->skill_courses->faculties->name }}</td>
                <td>{{ $student->students->academic_years->academic_year }}</td>
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
