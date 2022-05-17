<table class="table align-items-center" id="myTable">

    <thead class="" align="center">
        <tr>
            <th>#</th>
            <th>FACULTY NAME</th>
            <th>EMAIL</th>
            <th>STATUS </th>
            <th>FACULTY ID</th>
            <th>DEPARTMENT</th>
            <th>DESIGNATION</th>

        </tr>
    </thead>
    <tbody align="center">
    @foreach($faculties ?? '' as $faculty)
        <tr>
        <td>{{ $loop->iteration }}</td>
            <td>{{ $faculty->name }}</td>
            <td>{{ $faculty->email }}</td>
            <td>{{ $faculty->status }}</td>
            <td>{{ $faculty->facultyid }}</td>
            <td>{{ $faculty->departments->name }}</td>
            <td>{{ $faculty->designations->designation }}</td>

        </tr>
    @endforeach

    </tbody>

</table>
