   <table class="table align-items-center" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>SKILL STUDENT</th>
                                        <th>SKILL COURSE</th>
                                        <th>SKILL FACULTY</th>
                                        <th>STATUS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($skill_students ?? '' as $skill_student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill_student->students->name }}-{{$skill_student->students->rollno}}-{{$skill_student->students->departments->name}}</td>
                                        <td>{{ $skill_student->skill_courses->skill_courses->name}}</td>
                                        <td>{{ $skill_student->skill_courses->faculties->name}} - {{ $skill_student->skill_courses->faculties->departments->name }} -  {{ $skill_student->skill_courses->faculties->facultyid}} </td>
                                        <td>{{ $skill_student->status }}</td>
                                        <td>
                                            <form action="{{ route('skill_students.destroy',$skill_student->id) }}" method="post" >
                                            <a class="btn btn-outline-info" title="Show" href="{{ route('skill_students.show',$skill_student->id) }}"><span class="btn-inner--icon"><i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                                            <a class="btn btn-outline-primary" title="Edit" href="{{ url('skill_student_edit/'.$skill_student->id )}}"><span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i> </span></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><span class="btn-inner--icon"><i class="fa fa-trash-o" aria-hidden="true"></i> </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                             </tbody>
     </table>
