@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <i class="" aria-hidden="true"></i> <h4><b><center> SKILL FACULTIES </center></b></h4></div>
                    <div class="card-body">

                        <a href="{{ route('skill_faculties.create') }}" class="btn btn-success btn-sm" title="Add New Skill Faculties ">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW SKILL FACULTIES
                        </a>
                        <a href="{{ route('skill_faculty_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT SKILL FACULTIES
                        </a>

                        <div class="table-responsive">
                        <table class="table align-items-center " id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>SKILL FACULTY </th>
                                        <th>SKILL COURSE </th>
                                        <th>STATUS</th>
                                        <th>START DATE</th>
                                        <th>END DATE</th>
                                        <th> ACTIONS </th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($skill_faculties ?? '' as $skill_faculty)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill_faculty->faculties->name }}-{{$skill_faculty->faculties->facultyid}}-{{$skill_faculty->faculties->departments->name}}</td>
                                        <td>{{ $skill_faculty->skill_courses->name}}</td>
                                        <td>{{ $skill_faculty->status }}</td>
                                        <td>{{ $skill_faculty->startdate }}</td>
                                        <td>{{ $skill_faculty->enddate }}</td>
                                        <td>
                                            <form action="{{ route('skill_faculties.destroy',$skill_faculty->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('skill_faculties.show',$skill_faculty->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('skill_faculty_edit/'.$skill_faculty->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
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
