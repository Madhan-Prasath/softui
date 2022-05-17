@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <i class="" aria-hidden="true"></i><h4><b><center>  FACULTIES </center></b></h4></div>
                    <div class="card-body">

                        <a href="{{ route('faculties.create') }}" class="btn btn-success btn-sm" title="Add New Faculty ">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW FACULTY
                        </a>
                        <a href="{{ route('faculty_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT FACULTIES
                        </a>

                        <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">

                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>FACULTY NAME</th>
                                        <th>EMAIL</th>
                                        <th>STATUS </th>
                                        <th>FACULTY ID</th>
                                        <th>DEPARTMENT</th>
                                        <th>DESIGNATION</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($faculties ?? '' as $faculty)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faculty->name }}</td>
                                        <td>{{ $faculty->email }}</td>
                                        <td>{{ $faculty->status }}</td>
                                        <td>{{ $faculty->facultyid }}</td>
                                        <td>{{ $faculty->departments->name }}</td>
                                        <td>{{ $faculty->designations->designation }}</td>
                                        <td style="float:center">
                                            <form action="{{ route('faculties.destroy',$faculty->id) }}" method="post" >
                                            <a class="btn" style="font-size:15px"  title="Show" href="{{ route('faculties.show',$faculty->id) }}"><span ><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:15px"  title="Edit" href="{{ url('faculty_edit/'.$faculty->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
                                            @method('DELETE')
                                            <button type="submit" style="font-size:15px" class="btn" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="btn-inner--icon"><i class="fa fa-trash-o" aria-hidden="true"></i> </span></button>
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

    .dataTables_length > select
    {

          font-size: 2rem;

    }
    label > input {

    border-radius: 2rem;
    font-size: 2rem;

    }
    .pagination > .paginate_button  {

        white-space: 2rem;

    }

 </style>
 <script>
    function myFunction() {
      document.getElementsById("myTable_previous").style.fontSize = "30px";
    }
    </script>


@endsection
