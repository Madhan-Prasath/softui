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

<div class="fullscreen">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                <h4><b><center>MENTOR RATING </center></b></h4>
                </div>
                <div class="card-body">

                    <form  class="form align-items-center form-dark" action="{{ route('feedback.index') }}" method="POST" style="background-color:#F8F9F8">
                        @csrf


                    <div  class="thead-dark" >

                    <br>
                    <label for="rating" class="control-label"><h6><strong> GIVE A RATING FOR YOUR MENTOR :  </strong></label> <strong> &nbsp; {{ $faculty->name  }}  -  {{ $faculty->facultyid}}</strong></h6><br><br>
                    <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="">

                    </div>
                    @if($errors->has('rating'))
                        <div class="error"><br><lable style="color:red" >  &#8226; <b> Rate Your Mentor </b></lable></div>
                        @endif <br>

                    <br>

                    <div class="form-group mb-3">

                            <label for="comments"> <h6><strong>FEEDBACK</strong></h6></label>
                            <textarea class="form-control" name="comments" id="comments" rows="3" placeholder="Enter Your Valuable feedback or Comment  ( Optional ) ....."></textarea>
                    </div>

                    <div class="form-group mb-3">

                            <button type="submit" class="btn btn-primary">Save Feedback</button>

                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $("rating").rating();
   $('.select2').select2();
</script>
@endsection
