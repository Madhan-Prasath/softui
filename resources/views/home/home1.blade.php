@extends('layouts.app')
{{-- @section('content') --}}

<div class="row row-cols-1 row-cols-md-2 g-4 " >
    <div class="col-md-4 mb-4 " style="width: 300px;" >

      <div class="card card-pricing">
        <div class="card-header bg-gradient-secondary text-center pt-4 pb-5 position-relative" >
          <div class="z-index-1 position-relative" >
            <h5 class="text-white">SKILL FEED BACK</h5>
            <h1 class="text-white mt-2 mb-0">
              <small></small></h1>
            <h6 class="text-white"></h6>
          </div>
        </div>
        <div class="position-relative mt-n5" style="height: 50px;" >
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


</div>



  {{-- @endsection --}}
