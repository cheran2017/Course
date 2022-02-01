<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/quill/quill.snow.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/quill/quill.bubble.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/remixicon/remixicon.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/simple-datatables/style.css')}}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a  href="{{route('admin-dashboard')}}" class=" text-decoration-none logo d-flex align-items-center">
        @if(App\Models\Setting::find(1)->logo == null)
        <img src="{{asset('assets/img/logo.png')}}" alt="Profile" class="rounded-circle">
        @else
        <img src="{{asset('assets/images/'. App\Models\Setting::find(1)->logo)}}" alt="Profile" class="rounded-circle">
        @endif
        <span class="d-none d-lg-block">{{App\Models\Setting::find(1)->name}}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (auth()->user()->profile_photo_path == null)
            <img src="{{asset('assets/img/admin.jpg')}}" alt="Profile" class="rounded-circle">
            @else
            <img src="{{asset('assets/images/'.auth()->user()->profile_photo_path)}}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              @can('ManageProfile','App\Models\Setting')
              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('admin-profile')}}">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
                </a>
              </li>
              @endcan

              <a class="dropdown-item d-flex align-items-center" href="#">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-light" type="submit"><i class="bi bi-box-arrow-right"></i> {{ __('Log Out') }}</button>
                </form>
                
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('admin-dashboard') ? 'active-link' : '' }}" href="{{route('admin-dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('admin-user.create', 'admin-user.index',  'admin-user.edit') ? 'active-link' : '' }}" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Admin User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateAdminUser','App\Models\User')
          <li>
            <a href="{{route('admin-user.create')}}">
              <i class="bi bi-circle"></i><span>Create Admin User</span>
            </a>
          </li>
          @endcan
          @can('ViewAdminUser','App\Models\User')
          <li>
            <a href="{{route('admin-user.index')}}">
              <i class="bi bi-circle"></i><span>View Admin User</span>
            </a>
          </li>
          @endcan
     
        </ul>
      </li><!-- End technology Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('role-permission.create', 'role-permission.index',  'role-permission.edit') ? 'active-link' : '' }}" data-bs-target="#role-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Role Permission Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="role-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateRolePermission','App\Models\Role')
          <li>
            <a href="{{route('role-permission.create')}}">
              <i class="bi bi-circle"></i><span>Create Role Permissions</span>
            </a>
          </li>
          @endcan
          @can('ViewRolePermission','App\Models\Role')
          <li>
            <a href="{{route('role-permission.index')}}">
              <i class="bi bi-circle"></i><span>View Role Permissions</span>
            </a>
          </li>
          @endcan
     
        </ul>
      </li><!-- End technology Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('technology.create', 'technology.index',  'technology.edit') ? 'active-link' : '' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Technology Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateTechnology','App\Models\Technology')
          <li>
            <a href="{{route('technology.create')}}">
              <i class="bi bi-circle"></i><span>Create Technology</span>
            </a>
          </li>
          @endcan

          @can('ViewTechnology','App\Models\Technology')
          <li>
            <a href="{{route('technology.index')}}">
              <i class="bi bi-circle"></i><span>View Technology</span>
            </a>
          </li>
          @endcan
     
        </ul>
      </li><!-- End technology Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('course.create', 'course.index','course.edit') ? 'active-link' : '' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Course Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          @can('CreateCourse','App\Models\Course')
          <li>
            <a href="{{route('course.create')}}">
              <i class="bi bi-circle"></i><span>Create Course</span>
            </a>
          </li>
          @endcan

          @can('ViewCourse','App\Models\Course')
          <li>
            <a href="{{route('course.index')}}">
              <i class="bi bi-circle"></i><span>View Course</span>
            </a>
          </li>
          @endcan
         
        </ul>
      </li><!-- End course Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('category-course.create', 'category-course.index','category-course.edit') ? 'active-link' : '' }}" data-bs-target="#course-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Category Course Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="course-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateCategoryCourse','App\Models\Category')
          <li>
            <a href="{{route('category-course.create')}}">
              <i class="bi bi-circle"></i><span>Create Category Course</span>
            </a>
          </li>
          @endcan
          @can('ViewCategoryCourse','App\Models\Category')
          <li>
            <a href="{{route('category-course.index')}}">
              <i class="bi bi-circle"></i><span>View Category Course</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End course technology Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('course-technology.create', 'course-technology.index','course-technology.edit') ? 'active-link' : '' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Course Technology Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateCourseTechnology','App\Models\CourseTechnology')
          <li>
            <a href="{{route('course-technology.create')}}">
              <i class="bi bi-circle"></i><span>Create Course Technology</span>
            </a>
          </li>
          @endcan
          @can('ViewCourseTechnology','App\Models\CourseTechnology')
          <li>
            <a href="{{route('course-technology.index')}}">
              <i class="bi bi-circle"></i><span>View Course Technology</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End course technology Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('learning.create', 'learning.index','learning.edit') ? 'active-link' : '' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Course Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateLearning','App\Models\Learning')
          <li>
            <a href="{{route('learning.create')}}">
              <i class="bi bi-circle"></i><span>Create Learnings</span>
            </a>
          </li>
          @endcan

          @can('ViewLearning','App\Models\Learning')
          <li>
            <a href="{{route('learning.index')}}">
              <i class="bi bi-circle"></i><span>View Learnings</span>
            </a>
          </li>
          @endcan
  
        </ul>
      </li><!-- End learnings Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('course-title.create', 'course-title.index','course-title.edit','course-title-description.create', 'course-title-description.index','course-title-description.edit') ? 'active-link' : '' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Course Title Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateCourseTitle','App\Models\CourseTitle')
          <li>
            <a href="{{route('course-title.create')}}">
              <i class="bi bi-circle"></i><span>Create Course Title</span>
            </a>
          </li>
          @endcan

          @can('ViewCourseTitle','App\Models\CourseTitle')
          <li>
            <a href="{{route('course-title.index')}}">
              <i class="bi bi-circle"></i><span>View Course Title</span>
            </a>
          </li>
          @endcan
          @can('CreateCourseTitleDetail','App\Models\CourseTitleDetail')
          <li>
            <a href="{{route('course-title-description.create')}}">
              <i class="bi bi-circle"></i><span>Create Course Title Details</span>
            </a>
          </li>
          @endcan
          @can('ViewCourseTitleDetail','App\Models\CourseTitleDetail')
          <li>
            <a href="{{route('course-title-description.index')}}">
              <i class="bi bi-circle"></i><span>View Course Title Details</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End course title Nav -->
      @can('ViewEnquiry','App\Models\Enquiry')
      <li class="nav-item">
        <a class="payment text-decoration-none {{ Request::routeIs('enquiry-list') ? 'active-link' : '' }}"  href="{{route('enquiry-list',['status' => "0"])}}">
          <i class="bi bi-menu-button-wide"></i><span>Enquiry Management </span>
        </a>
      </li>
      @endcan
     
      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('payment-view', 'payment-details') ? 'active-link' : '' }}" data-bs-target="#dash-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-currency-dollar"></i><span>Payment Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dash-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('PaymentUpdate','App\Models\Payment')
          <li class="">
            <a class="payment {{ Request::routeIs('payment-view') ? 'active-link' : '' }}"  href="{{route('payment-view')}}">
              <i class="bi bi-circle"></i><span>Update Payment </span>
            </a>
          </li>
          @endcan
          @can('PaymentDetail','App\Models\Payment')
          <li class="">
            <a class="payment {{ Request::routeIs('payment-details') ? 'active-link' : '' }}"  href="{{route('payment-details')}}">
              <i class="bi bi-circle"></i> <span>Payment Details </span>
            </a>
          </li>
          @endcan
          @can('PaymentPending','App\Models\Payment')
          <li class="">
            <a class="payment {{ Request::routeIs('pending-payment') ? 'active-link' : '' }}"  href="{{route('pending-payment')}}">
              <i class="bi bi-circle"></i> <span>Pending Payment  </span>
            </a>
          </li>
          @endcan
          @can('PaymentHistory','App\Models\Payment')
          <li class="">
            <a class="payment {{ Request::routeIs('payment-history') ? 'active-link' : '' }}"  href="{{route('payment-history')}}">
              <i class="bi bi-circle"></i> <span>Payment History </span>
            </a>
          </li>
          @endcan
     
        </ul>
      </li><!-- End technology Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('users-course',  'users-list') ? 'active-link' : '' }}" data-bs-target="#ol-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Users Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ol-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('ViewUserList','App\Models\User')
          <li class="">
            <a class="payment {{ Request::routeIs('users-list') ? 'active-link' : '' }}"  href="{{route('users-list')}}">
              <i class="bi bi-circle"></i><span>Users List </span>
            </a>
          </li>
          @endcan
          @can('ViewUsersCourse','App\Models\User')
          <li class="">
            <a class="payment {{ Request::routeIs('users-course') ? 'active-link' : '' }}"  href="{{route('users-course')}}">
              <i class="bi bi-circle"></i> <span>Users Course </span>
            </a>
          </li>
          @endcan
     
        </ul>
      </li><!-- End Uses Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::routeIs('course-technology.create', 'course-technology.index','course-technology.edit') ? 'active-link' : '' }}" data-bs-target="#batch-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Batch Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="batch-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('CreateBatch','App\Models\Batch')
          <li>
            <a href="{{route('batch.create')}}">
              <i class="bi bi-circle"></i><span>Create Batch</span>
            </a>
          </li>
          @endcan
          @can('ViewBatch','App\Models\Batch')
          <li>
            <a href="{{route('batch.index')}}">
              <i class="bi bi-circle"></i><span>View Batch</span>
            </a>
          </li>
          @endcan
          @can('ViewBatchUser','App\Models\Batch')
          <li>
            <a href="{{route('batch-users')}}">
              <i class="bi bi-circle"></i><span> Batch Users</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End course technology Nav -->
      @can('ManageSetting','App\Models\Setting')
      <li class="nav-item">
        <a class="payment text-decoration-none {{ Request::routeIs('settings') ? 'active-link' : '' }}"  href="{{route('settings')}}">
          <i class="bi bi-gear"></i><span>System Settings </span>
        </a>
      </li>
      @endcan
    </ul>
  </aside><!-- End Sidebar-->



  @yield('content')



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main2.js')}}"></script>

</body>

</html>