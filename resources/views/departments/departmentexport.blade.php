<table class="table align-items-center" id="myTable">
    <thead class="" align="center">
        <tr>
            <th>#</th>
            <th>DEPARTMENT NAME</th>
            <th>CODE</th>
            <th>STATUS</th>

        </tr>
    </thead>
    <tbody align="center">
    @foreach($departments ?? '' as $department)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $department->name }}</td>
            <td>{{ $department->code }}</td>
            <td>{{ $department->status }}</td>
            
        </tr>
    @endforeach

    </tbody>
</table>
