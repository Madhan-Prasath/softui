<table class="table align-items-center" id="myTable">
    <thead class="" align="center">
        <tr>
            <th>#</th>
            <th>COURSE NAME</th>
            <th>COURSE CODE</th>
            <th>COURSE STATUS </th>
            <th>COURSE TYPE </th>

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

        </tr>
    @endforeach

    </tbody>
</table>
