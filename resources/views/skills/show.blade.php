@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
  <div class="card-header"><h4><b><center>{{ $skill->name }}  -  COURSES </center></b> </h4></div>
  <div class="card-body">
     <div class="table-responsive">
         <table class="table align-items-center" id=myTable>
            <thead class="" align="center">
                <tr>
                <th>#</th>
                <th><h5>Course Name</h5></th>
                <th><h5>Course Code</h5></th>
                <th><h5>Course Status</h5></th>

                </tr>
            </thead>
            <tbody>
                @foreach($courses ?? '' as $course)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->code  }}</td>
                <td>{{ $course->status }}</td>

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
