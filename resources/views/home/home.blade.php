@extends('layouts.app')
<link rel="icon" type="image/png" href="../assets/img/bit5.png">
{{-- @section('content') --}}

{{-- <div class="container" >
<div class="row align-items-right ">
<div class="col-md-4 mb-4"  style="height: 400px;" >
    <div class="card shadow-none border h-200" style="float: center;">

            <img class="img border-radius-lg move-on-hover" src="../assets/img/rate.jpg">

      <div class="card-header text-sm-left text-center pt-4 pb-3 px-4">
        <h5 class="mb-1"></h5>
        <p class="mb-3 text-sm"></p>
        <h3 class="font-weight-bolder mt-3">
           <small class="text-sm text-secondary font-weight-bold"></small>
        </h3>
        <a href="javascript:;" style="font-size:20px" class="btn btn-sm bg-gradient-dark w-100 border-radius-md mt-4 mb-2"> BIT RATING SYSTEM</a>
      </div>

    </div>
  </div>
</div>
</div> --}}<br>
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-center" id="navbar">

    <ul class="navbar-nav  justify-content-end">
    <li class="nav-item d-flex align-items-center">{{ (auth()->user()->name) }} &nbsp;
        <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none">Sign Out</span>
        </a>
    </li>
</ul>
</div>
<br><br>
{{-- <center>
<div class="card mb-3" style="width: 1540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="../assets/img/rate.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body" align="center">
          <img src="../assets/img/bit5.png" alt="" width="200px" ><br>
          <h3 class="card-title">BIT RATING SYSTEM</h3>
          <p class="card-text"></p>
          <p class="card-text"><small class="text-muted"></small></p>
        </div>
      </div>
    </div>
  </div>
</center>
<br><br> --}}
{{-- <div class="card" >
    <!-- Card image -->
    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1" style="width: 500px" >
      <img class="border-radius-lg w-100" src="../assets/img/rate.jpg" alt="Image placeholder" >
      <!-- List group -->

     </div>
    <!-- Card body -->
    <div class="card-body">
     <h3 class="card-title mb-3"> BIT RATING SYSTEM</h3>
    </div>
 </div>
</center> --}}
<center>
<div class="row row-cols-1 row-cols-md-2 g-4" style="max-width: 1000px;" >
    <div class="col-md-4 mb-4" style="width: 300px;" >
      <div class="card card-pricing" style="float: center;">
        <div class="card-header bg-gradient-secondary text-center pt-4 pb-5 position-relative">
          <div class="z-index-1 position-relative">
            <h5 class="text-white">SKILL FEED BACK</h5>
            <h1 class="text-white mt-2 mb-0">
              <small></small></h1>
            <h6 class="text-white"></h6>
          </div>
        </div>
        <div class="position-relative mt-n5" style="height: 50px;"  >
          <div class="position-absolute w-100">
              <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>

                <g class="moving-waves">
                  <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                  <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                  <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                  <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                  <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                  <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                </g>
              </svg>

            </div>
        </div>
        <div class="card-body text-center">
            <img src="../assets/img/skill.png" alt="" width="200px" >

          <br><br>
          <a href="{{ url('skill_feedback/create') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
            Leave Your Rate
          </a>
          <br><br>
          <a href="{{ url('skill_feedback_rateview') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
             View Rate/Register
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4" style="width: 300px;" >
      <div class="card card-pricing">
        <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
          <div class="z-index-1 position-relative">
            <h5 class="text-white">MENTOR FEED BACK</h5>
            <h1 class="text-white mt-2 mb-0">
              <small></small></h1>
            <h6 class="text-white"></h6>
          </div>
        </div>
        <div class="position-relative mt-n5" style="height: 50px;"  >
          <div class="position-absolute w-100">
              <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>

                <g class="moving-waves">
                  <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                  <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                  <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                  <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                  <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                  <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                </g>
              </svg>

            </div>
        </div>
        <div class="card-body text-center">
            <img src="../assets/img/mentor.png" alt="" width="200px" height="100px" >

          <br><br>
          <a href="{{ url('feedback/create') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
            Leave Your Rate
          </a>
          <br><br>
          <a href="{{ url('feedback_rateview') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
            View Mentors
          </a>
        </div>
      </div>
    </div>


    {{-- <div class="col-md-4 mb-4" style="width: 300px;" >
        <div class="card card-pricing">
          <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">ADMIN</h5>
              <h1 class="text-white mt-2 mb-0">
                <small></small></h1>
              <h6 class="text-white"></h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;"  >
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>

                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>

              </div>
          </div>
          <div class="card-body text-center">
              <img src="../assets/img/admin.jpg" alt="" width="200px" height="100px" >

            <br><br>
            <a href="{{ url('students') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
              ADMIN HERE
            </a>
            <br><br><br><br>
            <a href="{{ url('feedback_rateview') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0" hidden>
              View Mentors
            </a>
          </div>
        </div>
      </div> --}}

    <div class="col-md-4 mb-4" style="width: 300px;" >
        <div class="card card-pricing">
          <div class="card-header bg-gradient-primary text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">HOSTEL FEED BACK</h5>
              <h1 class="text-white mt-2 mb-0">
                <small></small></h1>
              <h6 class="text-white"></h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;"  >
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>

                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>

              </div>
          </div>
          <div class="card-body text-center">
              <img src="../assets/img/hostel.jpg" alt="" width="200px" height="100px" >

            <br><br>
            <a href="{{ url('feedback/create') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
              Leave Your Rate
            </a>
            <br><br><br><br>

            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4" style="width: 300px;" >
        <div class="card card-pricing">
          <div class="card-header bg-gradient-light text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-" style="font-color:black">CAMPUS FEED BACK</h5>
              <h1 class="text-white mt-2 mb-0">
                <small></small></h1>
              <h6 class="text-white"></h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;"  >
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>

                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>

              </div>
          </div>
          <div class="card-body text-center">
              <img src="../assets/img/campus.jpg" alt="" width="200px" height="100px" >

            <br><br>
            <a href="{{ url('feedback/create') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
              Leave Your Rate
            </a>
            <br><br><br><br>

            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4" style="width: 300px;" >
        <div class="card card-pricing">
          <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
            <div class="z-index-1 position-relative">
              <h5 class="text-white">SPECIAL LAB</h5>
              <h1 class="text-white mt-2 mb-0">
                <small></small></h1>
              <h6 class="text-white"></h6>
            </div>
          </div>
          <div class="position-relative mt-n5" style="height: 50px;"  >
            <div class="position-absolute w-100">
                <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                  <defs>
                    <path id="card-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>

                  <g class="moving-waves">
                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                  </g>
                </svg>

              </div>
          </div>
          <div class="card-body text-center">
              <img src="../assets/img/special.jpg" alt="" width="200px" height="100px" >

            <br><br>
            <a href="{{ url('students') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0">
              LEAVE YOUR RATE
            </a>
            <br><br><br><br>
            <a href="{{ url('feedback_rateview') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0" hidden>
              View Mentors
            </a>
          </div>
        </div>
      </div>


</div>


  {{-- @endsection --}}
