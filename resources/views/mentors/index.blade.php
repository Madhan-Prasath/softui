@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <i class="" aria-hidden="true"></i> <h4><b> MENTORS </b></h4></div>
                    <div class="card-body">

                        <a href="{{ route('mentors.create') }}" class="btn btn-success btn-sm" title="Add New Mentor ">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW MENTOR
                        </a>
                        <a href="{{ route('mentor_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT MENTORS
                        </a>
                        <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="t" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>MENTOR</th>
                                        <th>STUDENT</th>
                                        <th>MENTOR STATUS</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($mentors ?? '' as $mentor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mentor->faculties->name }}-{{$mentor->faculties->facultyid}}-{{$mentor->faculties->departments->name}}</td>
                                        <td>{{ $mentor->students->rollno }}- {{$mentor->students->departments->name }} - {{$mentor->students->name}} - {{$mentor->students->batches->batch }}</td>
                                        <td>{{ $mentor->mentor_status }}</td>
                                        <td>
                                            <form action="{{ route('mentors.destroy',$mentor->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('mentors.show',$mentor->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('mentor_edit/'.$mentor->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
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
