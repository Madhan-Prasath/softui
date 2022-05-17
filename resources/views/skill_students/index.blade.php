@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <div class="card-header"> <h4><i class="" aria-hidden="true"></i> <b><center> SKILL STUDENTS </center></b></h4></div>
                    <div class="card-body">

                        <a href="{{ route('skill_students.create') }}" class="btn btn-success btn-sm" title="Add New Skill Faculties ">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW SKILL STUDENTS
                        </a>
                        <a href="{{ route('skill_student_export') }}" class="btn btn-success btn-sm" style="float:right" title="Add New Student ">
                            <i class="fa fa-plus" aria-hidden="true"></i>  EXPORT SKILL STUDENTS
                        </a>

                        <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>SKILL STUDENT</th>
                                        <th>SKILL COURSE</th>
                                        <th>SKILL FACULTY</th>
                                        <th>STATUS</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($skill_students ?? '' as $skill_student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill_student->students->name }}-{{$skill_student->students->rollno}}-{{$skill_student->students->departments->name}}</td>
                                        <td>{{ $skill_student->skill_courses->skill_courses->name}}</td>
                                        <td>{{ $skill_student->skill_courses->faculties->name}} - {{ $skill_student->skill_courses->faculties->departments->name }} -  {{ $skill_student->skill_courses->faculties->facultyid}} </td>
                                        <td>{{ $skill_student->status }}</td>
                                        <td>
                                            <form action="{{ route('skill_students.destroy',$skill_student->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('skill_students.show',$skill_student->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('skill_student_edit/'.$skill_student->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
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
