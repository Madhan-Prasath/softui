@extends('layouts.user_type.auth')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
  <div class="card-header pb-0">
           <center><h5><b>ROLE MANAGEMENT</b></h5></center>
  </div><br>
        <div class="    ">
        {{-- @can('role-create') --}}
            <a class="btn btn-success" href="{{ route('roles.create') }}">&nbsp; &nbsp; &nbsp; &nbsp; Create New Role</a>
            {{-- @endcan --}}
        </div><br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="card-body px-0 pt-0 pb-2">
<div class="table-responsive p-0"   >
<table class="table align-items-center mb-0">
<thead  class="text-center">
  <tr>
     <th>NO</th>
     <th>NAME</th>
     <th >ACTION</th>
  </tr>
</thead>
<tbody  class="text-center" >
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <form action="{{ route('roles.destroy',$role->id) }}" method="post" >
            <a class="btn" style="font-size:13px" href="{{ route('roles.show',$role->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
            {{-- @can('role-edit') --}}
                <a class="btn" style="font-size:13px" href="{{ url('roles_edit/'.$role->id) }}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
            {{-- @endcan --}}
            {{-- @can('role-delete') --}}
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" style="font-size:13px" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="btn-inner--icon"><i class="fa fa-trash-o" aria-hidden="true"></i> </span></button>
            </form>
                {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'i','style'=>'fontsize:15px']) !!}
                {!! Form::close() !!} --}}


            {{-- @endcan --}}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>

{!! $roles->render() !!}
@endsection



