<table class="table align-items-center" id="myTable">
    <thead class="" align="center">
        <tr>
            <th>#</th>
            <th> ROLLNO</th>
            <th> NAME</th>
            <th> EMAIL</th>
            <th>STATUS</th>
            <th>DEPARTMENT</th>
            <th>SEMESTER</th>
            <th>BATCH</th>
            <th>ACADEMIC YEAR</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody align="center">
    @foreach($students ?? '' as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->rollno }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->status }}</td>
            <td>{{ $student->departments->name }}</td>
            <td>{{ $student->semesters->semester }}</td>
            <td>{{ $student->batches->batch }}</td>
            <td>{{ $student->academic_years->academic_year }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="post" >
                <a class="btn btn-outline-info" title="Show" href="{{ route('students.show',$student->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                <a class="btn btn-outline-primary" title="Edit" href="{{ url('student_edit/'.$student->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"> <span class="btn-inner--icon"><i class="fa fa-trash-o"  aria-hidden="true"></i> </span> </button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
