<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="shortcut icon" href="assets/images/x-icon.png" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('assets2/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">

</head>
<body>

    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->


    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->


    <!-- header section start here -->
    <header class="header-section header-shadow">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <div class="logo">
                            @if (App\Models\Setting::find(1)->logo == null)
                                <a href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="logo"></a>
                            @else
                                <a href="{{route('home')}}"><img class="w-25 h-25"  src="{{asset('assets/images/'. App\Models\Setting::find(1)->logo)}}" alt="logo"></a>
                            @endif                       
                        </div>
                    </div>
                    <div class="menu-area">
                        <div class="menu">
                            <ul class="lab-ul">
                                <li>
                                    <a class="text-primary text-decoration-none" href="{{route('home')}}">Home</a>                                   
                                </li>
                                
                                <li>
                                    <a class="text-primary text-decoration-none" href="{{route('view-enquiry')}}">Enquiries</a>
                                </li>
                                @auth
                                <li>
                                    <a href="#0" class="text-primary text-decoration-none">Menu</a>
                                    <ul class="lab-ul">
                                        <li><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                                        <li><a href="{{ route('profile.show') }}" class="text-decoration-none">Profile</a></li>
                                        <li class=" h6 bold ml-5 ">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="btn border-none bg-none text-dark" > {{ __('Log Out') }} </button>
                                            </form>
                                       </li>
                                    </ul>
                                </li>
                                @endauth

                            </ul>
                        </div>
                        
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('user-register')}}" class="signup text-decoration-none"><i class="icofont-user"></i> <span>{{auth()->user()->name}}</span> </a>
                            @else
                                @if (Route::has('register'))
                                <a href="{{ route('user-register')}}" class="signup text-decoration-none"><i class="icofont-users"></i> <span>SIGN UP</span> </a>
                                @endif
                                <a href="{{ route('login') }}" class="login text-decoration-none"><i class="icofont-user"></i> <span>LOG IN</span> </a>

                            @endauth
                        @endif
                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="ellepsis-bar d-lg-none">
                            <i class="icofont-info-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending here -->


    @yield('content')



    <div class="footer-bottom style-2">
        <div class="container">
            <div class="section-wrapper">
                <p>&copy; 2022 <a href="index.html">Course</a> </p>
            </div>
        </div>
    </div>
    <script src="{{asset('assets2/js/jquery.js')}}"></script>
    <script src="{{asset('assets2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets2/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets2/js/progress.js')}}"></script>
    <script src="{{asset('assets2/js/lightcase.js')}}"></script>
    <script src="{{asset('assets2/js/counter-up.js')}}"></script>
    <script src="{{asset('assets2/js/isotope.pkgd.js')}}"></script>
    <script src="{{asset('assets2/js/functions.js')}}"></script>

</body>
</html>