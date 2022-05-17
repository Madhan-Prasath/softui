@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h4><i class="" aria-hidden="true"></i> <b><center> SKILL FEEDBACK </center> </b></h4></div>
                    <div class="card-body">


                      <a href="{{ route('studentregister') }}" class="btn btn-success btn-sm" title="Register Skill ">
                        <i class="fa fa-plus" aria-hidden="true"></i> Register Skill
                      </a>


                      <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>FACULTY ID</th>
                                        <th>SKILL FACULTY NAME</th>
                                        <th>SKILL COURSE</th>
                                        <th>AVG RATING</th>
                                        <th>TOTAL STUDENTS RATED</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($result ?? '' as $re)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $re->facultyid }}</td>
                                        <td>{{ $re->name }}</td>
                                        <td>{{ $re->course_name }}</td>
                                        <td>{{ number_format(($re->avg), 2, '.', '') }}</td>
                                        <td>{{ $re->count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <br><br>
{{--
                        <div class="table-responsive">
                        <table class="table align-items-center table-light">
                                <thead class="thead-light" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th><h5>SKILL STUDENT</h5></th>
                                        <th><h5>SKILL FACULTY</h5></th>
                                        <th><h5>SKILL COURSE</h5></th>
                                        <th><h5>RATE</h5></th>

                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($skill_feedback ?? '' as $skill_feedback)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill_feedback->skill_students->students->name }}-{{ $skill_feedback->skill_students->students->rollno }}-{{ $skill_feedback->skill_students->students->departments->name }}   </td>
                                        <td>{{ $skill_feedback->skill_students->skill_courses->faculties->name }} - {{ $skill_feedback->skill_students->skill_courses->faculties->facultyid }} - {{ $skill_feedback->skill_students->skill_courses->faculties->departments->name }} </td>
                                        <td>{{ $skill_feedback->skill_students->skill_courses->skill_courses->name }} </td>
                                        <td>{{ $skill_feedback->rating}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                        <br>
                        <br>


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
