@extends('layouts.user_type.auth')

@section('content')


     <title>Bootstrap star rating example</title>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">

	<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

	<!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
	<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />


	<!-- important mandatory libraries -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>

	<!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>

	<!-- optionally if you need translation for your language then include locale file as mentioned below (replace LANG.js with your own locale file) -->
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>


<style>

.rating-container  {
  width: 200px;


}

</style>

<div class="fullscreen">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header"> <h4><b><i class="" aria-hidden="true"></i><center>  SKILL FEEDBACK </center></b></h4></div>
                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table align-items-center mb-0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>SKILL STUDENT</th>
                                        <th>SKILL FACULTY</th>
                                        <th>SKILL COURSE</th>
                                        <th>GIVE A RATING TO SKILL FACULTY</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center"  >
                                @foreach($skillStudent ?? '' as $faculty)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $faculty->students->name }} - {{ $faculty->students->rollno }} - {{ $faculty->students->departments->name }}</td>
                                    <td >{{ $faculty->skill_courses->faculties->name }} - {{ $faculty->skill_courses->faculties->facultyid }} -  {{ $faculty->skill_courses->faculties->departments->name }} </td>
                                    <td >{{ $faculty->skill_courses->skill_courses->name }}
                                    <td>

                                    <div class="d-flex flex-column justify-content-center">
                                    <form action="{{ route('skill_feedback.update',$faculty->id) }}" method="post">
                                    @csrf
                                    @method("PUT")




                                    <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value=""  onclick="disableButton(this)" >


                                    @if($errors->has('rating'))
                                    <div class="error"><br><label style="color:red" >  &#8226; <b> Rate Your Skill Feeback </b></label></div>
                                    @endif <br>




                                  <div class="form-group mb-3">

                                  <button name ="submit" id = "submit" type="submit" class="btn btn-outline-danger" title="Rate" onclick="return confirm(&quot;Confirm Rate?&quot;)">Save Feedback</button>

                                   </div>



                                  </form>
                                </div>

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
<script>
   $("rating").rating();

</script>


@endsection
