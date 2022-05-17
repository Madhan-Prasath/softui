<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background-color:powderblue;" >

<div class="fullscreen"  style="background-color:powderblue;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" align="center" style="background-color:powderblue;"><br><br>
                    <div class="card-header" style="background-color:powderblue;"> <strong> <h2><b><center> FEEDBACK SYSTEM </center> </strong></b></h2></div>
                    <div class="card-body" style="background-color:powderblue;">
                     <br> <br>
                      <strong><center>Hi    {{ (auth()->user()->name) }}........!  <br> <br>  SELECT YOUR PLATFORM TO RATE & FEEDBACK </center> </strong>
                      <br> <br>

                      <a href="{{ route('skill_feedback.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >SKILL FEEDBACK</a> <br><br>
                      <a href="{{ route('feedback.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >MENTOR FEEDBACK</a> <br><br>
                      <a href="{{ route('feedback.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >HOSTEL FEEDBACK</a> <br><br>

                      <a href="{{ route('feedback.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >CAMPUS FEEDBACK</a> <br><br>



                    </div>
                </div>
            </div>
    </div>
</div>
</body>

    