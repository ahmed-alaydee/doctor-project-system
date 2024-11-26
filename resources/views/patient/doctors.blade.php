@extends('layouts.main')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Doctors</li>
               </ol>
            </nav>
            <h2 class="breadcrumb-title">Doctors</h2>
         </div>
      </div>
   </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         @include('includs.patientsidebar')
         <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="row row-grid">

               @foreach ( $doctors as $doctor )
               <div class="col-md-6 col-lg-4 col-xl-3">
                  <div class="profile-widget">
                     <div class="doc-img">
                        <a href="doctor-profile.html">
                        <img class="img-fluid" alt="User Image" src="{{$doctor->image}}">
                        </a>
                        <a href="javascript:void(0)" class="fav-btn">
                        <i class="far fa-bookmark"></i>
                        </a>
                     </div>
                     <div class="pro-content">
                        <h3 class="title">
                           <a href="doctor-profile.html">{{$doctor->name}}</a> 
                           <i class="fas fa-check-circle verified"></i>
                        </h3>
                        <p class="speciality">{{$doctor->specialize}}</p>
                        <ul class="available-info">
                           <li>
                              <i class="fas fa-map-marker-alt"></i> {{$doctor->address}}
                           </li>
                           <li>
                              <i class="far fa-money-bill-alt"></i> {{$doctor->price}} <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                           </li>
                        </ul>
                        <div class="row row-sm">
                           <div class="col-6">
                              <a href="{{ route('showdoctorprofile', $doctor->id) }}" class="btn view-btn">View Profile</a>
                           </div>
                           <div class="col-6">
                              <a href="{{route('patientbook', $doctor->id)}}" class="btn book-btn">Book Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                  
               @endforeach

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
@endsection
@push('js')
<!-- Sticky Sidebar JS -->
<script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/script.js')}}"></script>
@endpush