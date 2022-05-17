@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <div class="card-header"> <h4><b><i class="" aria-hidden="true"></i><center>  STUDENTS  </center></b></h4></div>
                    <div class="card-body">

                       <a href="{{ route('students.create') }}" class="btn btn-success btn-sm" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  NEW STUDENT
                        </a>

                         <a href="{{ route('student_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT STUDENTS
                        </a>
                        <br><br>
                        <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th> ROLLNO</th>
                                        <th> NAME</th>
                                        <th> EMAIL</th>
                                        <th>STATUS</th>
                                        <th>DEPARTMENT</th>
                                        <th>SEMESTER</th>
                                        <th>BATCH</th>
                                        <th>ACADEMIC YEAR</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($students ?? '' as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->rollno }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->status }}</td>
                                        <td>{{ $student->departments->name }}</td>
                                        <td>{{ $student->semesters->semester }}</td>
                                        <td>{{ $student->batches->batch }}</td>
                                        <td>{{ $student->academic_years->academic_year }}</td>
                                        <td>
                                            <form action="{{ route('students.destroy',$student->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('students.show',$student->id) }}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></span> </a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('student_edit/'.$student->id )}}"><span></span><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="font-size:13px" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><span><i class="cursor-pointer fas fa-trash text-secondary"  aria-hidden="true"></i></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
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
   .paginate_button > .page-item {
       font-size: 2rem;
   }

</style>
@endsection
