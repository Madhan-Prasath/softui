<table class="table align-items-center " id="myTable">
    <thead class="" align="center">
        <tr>
            <th>#</th>
            <th>SKILL FACULTY </th>
            <th>SKILL COURSE </th>
            <th>STATUS</th>
            <th>START DATE</th>
            <th>END DATE</th>
            
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

        </tr>
    @endforeach

    </tbody>
</table>
