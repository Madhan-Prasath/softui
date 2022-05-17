@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <i class="" aria-hidden="true"></i> <h4> <b> <center>SKILL COURSES </center></b></h4></div>
                    <div class="card-body">

                        <a href="{{ route('skill_courses.create') }}" class="btn btn-success btn-sm" title="Add New Faculty ">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW SKILL COURSE
                        </a>
                        <a href="{{ route('skill_course_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT SKILL COURSES
                        </a>

                        <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>COURSE NAME</th>
                                        <th>COURSE CODE</th>
                                        <th>COURSE STATUS </th>
                                        <th>COURSE TYPE </th>
                                        <th> ACTIONS </th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($skill_courses ?? '' as $skill_course)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill_course->name }}</td>
                                        <td>{{ $skill_course->code }}</td>
                                        <td>{{ $skill_course->status }}</td>
                                        <td>{{ $skill_course->skills->name }}</td>
                                        <td>
                                            <form action="{{ route('skill_courses.destroy',$skill_course->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('skill_courses.show',$skill_course->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('skill_course_edit/'.$skill_course->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
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
