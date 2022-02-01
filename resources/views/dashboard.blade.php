@extends('layouts.user.dashboard-header')
@section('content')
      


    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container ">
            <div class="row  ">
                <div class="col-lg-12 col-12 mb-5">
                    <div class="pageheader-content mb-5">
                        <h3 class="phs-title mb-3"><a href="{{route('home')}}">Home</a> / <span class="text-primary">Dashboard</span> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg ">
        <div class="container">
            <div class="row justify-content-center mx-3">
               <div class="shadow-sm bg-white rounded">
                    <div class="m-4">
                        <p class="text-center h2 icon-dash"><i class="bi bi-stack"></i></p>
                        <h5 class="text-center mt-2"><a class="float-right text-dark" href="{{route('education-detail')}}">Manage Education Details</a></h5>
                    </div>
               </div>
                
               <div class="shadow-sm bg-white rounded mt-3">
                   <div class="m-4">
                        <p class="text-center h2 icon-dash"><i class="bi bi-card-checklist"></i></p>
                        <h5 class="text-center mt-2"><a class="float-right text-dark" href="{{route('view-enquiry')}}">View Enquiry</a></h5>
                   </div>
                 
            </div>
             
            </div>
        </div>
    </div>
    <!-- course section ending here -->

    @endsection