@include('layouts.header')
@include('layouts.sidebar')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Welcome !!! {{ Auth::user()->name }}</h1>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    {{ Session::get('success') }}
  </div>
  @endif
  @if($errors->any())
  @foreach($errors->all() as $key => $error)
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    {{$error}}
  </div>
  @endforeach
  @endif
  <!-- Content Row -->
  @if(Auth::user()->user_type == 'admin')
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No. of Guest Attempt Quiz</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$allscoredata->count()}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl- col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">No. of Total Guest</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$AllUserData->count()}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  @endif
  @if(Auth::user()->user_type == 'guest')
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">MCQ</div>
            </div>
            <div class="col-auto">
              @if($scoreData->count()>0)
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">STATUS : TEST DONE</div>
              @else
              <a class="btn btn-success" href="{{ asset('startMCQ') }}" role="button">Start</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  @endif

</div>
<!-- /.container-fluid -->


@include("layouts.footer")