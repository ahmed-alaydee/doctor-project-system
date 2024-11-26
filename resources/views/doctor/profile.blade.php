@extends('layouts.main')
{{-- -------------------------- --}}
@push('css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dropzone.min.css')}}">
@endpush
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
               </ol>
            </nav>
            <h2 class="breadcrumb-title">Profile Settings</h2>
         </div>
      </div>
   </div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
            @include('includs.doctorsidbar')
         </div>
         <div class="col-md-7 col-lg-8 col-xl-9">
            <form action="{{route('doctor.update' , $doctor->id)}}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <!-- Basic Information -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Basic Information</h4>
                     <div class="row form-row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <div class="change-avatar">
                                 <div class="profile-img">
                                    <img src="{{Auth::guard('doctor')->user()->image}}" alt="User Image" name="image" title="image user">
                                 </div>
                                 <div class="upload-img">
                                    <div class="change-photo-btn">
                                       <span><i class="fa fa-upload"></i> Upload Photo</span>
                                       <input type="file" class="upload" name="image">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Username <span class="text-danger">*</span></label>
                              <input value="{{$doctor->name}}" type="text" class="form-control" name="name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Email <span class="text-danger">*</span></label>
                              <input  value="{{$doctor->email}}" type="email" class="form-control" name="email" >
                           </div>
                        </div>

                          <div class="col-md-12">
                           <div class="form-group">
                              <label>Specialize <span class="text-danger">*</span></label>
                              <input  value="{{$doctor->specialize}}" type="text" class="form-control" name="specialize" >
                           </div>
                        </div>

                        {{-- <div class="col-md-6">
                           <div class="form-group">
                              <label>First Name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control">
                           </div>
                        </div> --}}

                        {{-- <div class="col-md-6">
                           <div class="form-group">
                              <label>Last Name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control">
                           </div>
                        </div> --}}

                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Phone Number</label>
                              <input  value="{{$doctor->phone}}" type="text" class="form-control" name="phone">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Country</label>
                              <input value="{{$doctor->address}}"  type="text" class="form-control" name="address">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /Basic Information -->
               <!-- About Me -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">About Me</h4>
                     <div class="form-group mb-0">
                        <label>Biography</label>
                        <textarea class="form-control" rows="5" name="bio"> {{$doctor->bio}}</textarea>
                     </div>
                  </div>
               </div>
               <!-- /About Me -->
               <!-- Pricing -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Pricing</h4>
                     <div class="form-group mb-0">
                        <div id="pricing_select">
                           <input value="{{$doctor->price}}" type="text" class="form-control" id="custom_rating_input" name="price"   placeholder="writ price ">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /Pricing -->
               <div class="submit-section submit-btn">
                  <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                  
               </div>
               
            </form>
          
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
@endsection
{{-- ------------------------ --}}
@push('js')
<!-- Sticky Sidebar JS -->
<script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Dropzone JS -->
<script src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>
<!-- Bootstrap Tagsinput JS -->
<script src="{{asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<!-- Profile Settings JS -->
<script src="{{asset('assets/js/profile-settings.js')}}"></script>
@endpush