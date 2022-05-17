@extends('layouts.user_type.auth')

@section('content')

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> <i class="" aria-hidden="true"></i><h4><b><center> BATCHES</center></b></h4></div>
                    <div class="card-body">
                        <a href="{{ route('batches.create') }}" class="btn btn-success btn-sm" title="Add New Batch">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW BATCH
                        </a>

                        <div class="table-responsive">
                            <table class="table  align-items-center" id="myTable">
                                <thead class="" align="center">
                                    <tr font-size="10">
                                        <th>#</th>
                                        <th>BATCH</th>
                                        <th>ACTIONS </th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($batches ?? '' as $batch)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $batch->batch }}</td>
                                        <td>
                                            <form action="{{ route('batches.destroy',$batch->id) }}" method="post" >
                                            <a class="btn" style="font-size:13px" title="Show" href="{{ route('batches.show',$batch->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn" style="font-size:13px" title="Edit" href="{{ url('batch_edit/'.$batch->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
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
