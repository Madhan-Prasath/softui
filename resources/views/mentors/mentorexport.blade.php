<table class="table align-items-center" id="myTable">
    <thead class="t" align="center">
        <tr>
            <th>#</th>
            <th>MENTOR</th>
            <th>STUDENT</th>
            <th>MENTOR STATUS</th>

        </tr>
    </thead>
    <tbody align="center">
    @foreach($mentors ?? '' as $mentor)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mentor->faculties->name }}-{{$mentor->faculties->facultyid}}-{{$mentor->faculties->departments->name}}</td>
            <td>{{ $mentor->students->rollno }}- {{$mentor->students->departments->name }} - {{$mentor->students->name}} - {{$mentor->students->batches->batch }}</td>
            <td>{{ $mentor->mentor_status }}</td>
           
        </tr>
    @endforeach

    </tbody>
</table>
