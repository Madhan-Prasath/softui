@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <h4><i class="" aria-hidden="true"></i> <b> <center> MENTORS FEEDBACK </center></b></h4></div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>FACULTY ID</th>
                                        <th>FACULTY NAME</th>
                                        <th>AVG RATE</th>
                                        <th>TOTAL RATED STUDENTS</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($result ?? '' as $re)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $re->facultyid }}</td>
                                        <td>{{ $re->name }}</td>
                                        <td>{{ number_format(($re->avg), 2, '.', '') }}</td>
                                        <td>{{ $re->count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <br>
                        {{-- <div class="table-responsive">
                        <table class="table align-items-center table-light">
                                <thead class="thead-light" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th><h5>STUDENT </h5></th>
                                        <th><h5>MENTOR </h5></th>
                                        <th><h5>FEEDBACK </h5></th>
                                        <th><h5>RATING</h5></th>
                                        <th><H5> ACTIONs</H5></th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($feedback ?? '' as $feedback)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feedback->students->name }}- {{ $feedback->students->rollno }} - {{ $feedback->students->departments->name }}</td>
                                        <td>{{ $feedback->faculties->faculties->name }}- {{ $feedback->faculties->faculties->facultyid }} - {{ $feedback->faculties->faculties->departments->name }} </td>
                                        <td>{{ $feedback->comments }}</td>
                                        <td>{{ $feedback->rating }}</td>
                                        <td>
                                            <form action="{{ route('feedback.destroy',$feedback->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="btn-inner--icon"><i class="fa fa-trash-o" aria-hidden="true"></i> </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div> --}}
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
