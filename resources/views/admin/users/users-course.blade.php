@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users Management </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{route('enquiry-list')}}">Users List</a></li> --}}
          <li class="breadcrumb-item active">Users List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">
                <div class="card-body">

                  <!-- Messages -->
                  <x-Message-component/>

                  <h5 class="card-title">Users List</h5>

                  <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($Enquiry as $item)
        
                      <tr>
                        <th scope="row">{{$item->enquiry_id}}</th>
                        <td scope="row">{{$item->User->name}}</td>
                        <td>{{$item->User->email}}</td>
                        <td>{{$item->Course->name}}</td>
                      </tr>
                                  
                      @empty
                        <p class="text-danger">No Payment Made by this user</p>
                      @endforelse

                    </tbody>
                  </table>


                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection