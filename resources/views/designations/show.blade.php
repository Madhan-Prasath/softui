@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
    <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header"><h4><b><center>{{ $designation->designation }} - FACULTIES </center></b> </h4></div>
    <div class="card-body">
     <div class="table-responsive">
         <table class="table align-items-center" id="myTable">
            <thead class="" align="center">
                <tr>
                <th>#</th>
                <th>FACULTY NAME</th>
                <th>FACULTY EMAIL</th>
                <th>STATUS</th>
                <th>FACULTY ID</th>
                <th>DEPARTMENT</th>

                </tr>
            </thead>
            <tbody align="center">
                @foreach($designation->faculties as $faculty)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $faculty->name }}</td>
                <td>{{ $faculty->email }}</td>
                <td>{{ $faculty->status }}</td>
                <td>{{ $faculty->facultyid  }}</td>
                <td>{{ $faculty->departments->name }}</td>
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
