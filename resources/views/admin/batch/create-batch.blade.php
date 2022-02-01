@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Batch Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Create Batch</li>
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

                  <h5 class="card-title">Create Batch</h5>
                  <form action="{{route('batch.store')}}" method="post" enctype = "multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Batch Name</label>
                            <input type="text" name = "name" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Batch Timing</label>
                            <input type="text" name = "timing" class="form-control" id="" aria-describedby="Name" >
                        </div>
                        
                        <button class="btn btn-primary mt-4 mb-3 text-dark " type="submit">Submit</button>
                   </form>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection