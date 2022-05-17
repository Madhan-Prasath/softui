@extends('layouts.user_type.auth')

@section('content')


<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <i class="" aria-hidden="true"></i> <h4><b><center> DEPARTMENTS</center></b></h4></div>
                    <div class="card-body">
                        <a href="{{ route('departments.create') }}" class="btn btn-success btn-sm" title="Add New Department ">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW DEPARTMENT
                        </a>

                        <a href="{{ route('department_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add Department ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT DEPARTMENT
                        </a>

                        <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>DEPARTMENT NAME</th>
                                        <th>CODE</th>
                                        <th>STATUS</th>
                                        <th> ACTIONS </th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($departments ?? '' as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->code }}</td>
                                        <td>{{ $department->status }}</td>
                                        <td>
                                            <form action="{{ route('departments.destroy',$department->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('departments.show',$department->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('department_edit/'.$department->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="font-size:13px" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="btn-inner--icon"><i class="fa fa-trash-o" aria-hidden="true"></i> </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                      {{-- <center>  {{ $departments->onEachSide(3)->links() }} </center> --}}
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

    </style>


@endsection

