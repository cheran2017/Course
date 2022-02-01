@extends('layouts.user.dashboard-header')
@section('content')
      

    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
                <div class="col-lg-7 col-12">
                    <div class="pageheader-thumb">
                        <img src="{{asset('assets/images/'.$Course->image)}}" alt="rajibraj91" class="h-50 w-100 image-thumbnail">
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="pageheader-content">
                
                        <h2 class="phs-title">{{$Course->name}}</h2>
                        <p class="phs-desc">{{$Course->short_description}}</p>
                        <p class="phs-desc">{{$Course->detailed_description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->


    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg">
        <div class="container">
            <!-- Messages -->
            <x-Message-component/> 
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="main-part">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-content">
                                    <h3>Course Overview</h3>
                                    <p>{{$Course->detailed_description}}</p>
                                    <h4>What You'll Learn in This Course:</h4>
                                    <ul class="lab-ul">
                                        @foreach ($Course->Learning as $item)
                                        <li><i class="icofont-tick-mark"></i>{{$item->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="course-video">
                            <div class="course-video-title">
                                <h4>Course Content</h4>
                            </div>
                            <div class="course-video-content">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <!-- Accordion without outline borders -->
                                        <div class="accordion accordion-flush " id="accordionFlushExample">
                                            @foreach ($Course->CourseTitle as $item)
                                        <div class="accordion-item mt-3">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed text-light shadow-sm " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$item->id}}" aria-expanded="false" aria-controls="flush-collapse{{$item->id}}">
                                                {{$item->title}}
                                            </button>
                                            </h2>
                                            <div id="flush-collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body text-dark bg-white rounded shadow-sm"> 
                                                @foreach ($item->CourseTitleDescription as $value)
                                                    {{$value->description}}
                                                @endforeach
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        </div><!-- End Accordion without outline borders -->
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-part">
                        <div class="course-side-detail">
                            <div class="csd-title">
                                <div class="csdt-left">
                                    <h4 class="mb-0"><sup>$</sup>38</h4>
                                </div>
                                <div class="csdt-right">
                                    <p class="mb-0"><i class="icofont-clock-time"></i>Limited time offer</p>
                                </div>
                            </div>
                            <div class="csd-content">
                                <div class="sidebar-payment">
                                </div>
                                <div class="course-enroll">
                                    @if ($CheckEnquiry)                        
                                    <a class="lab-btn bg-success" >Enquiry Submitted</a>
                                    @else
                                    @if (auth()->user()->role == "0")                        
                                    <a href="{{route('enquiry', $Course->id)}}" class="lab-btn"><span>Enrolled Now</span></a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course section ending here -->

    @endsection