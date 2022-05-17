@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="" aria-hidden="true"></i>  <h4><b><center> ACADEMIC YEARS </center></b></h4>
                </div>
                    <div class="card-body">

                        <a href="{{ route('academic_years.create') }}" class="btn btn-success btn-sm" title="Add New Academic Year">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW ACADEMIC YEAR
                        </a>

                        <div class="table-responsive">
                            <table class="table  align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>ACADEMIC YEAR</th>
                                        <th>ACTIONS </th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    @foreach($academic_years ?? '' as $academic_year)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $academic_year->academic_year }}</td>
                                        <td>
                                            <form action="{{ route('academic_years.destroy',$academic_year->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('academic_years.show',$academic_year->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('academic_year_edit/'.$academic_year->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
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
