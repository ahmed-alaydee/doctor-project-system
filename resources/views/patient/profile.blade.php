@extends('layouts.main')

@push('css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dropzone.min.css')}}">	<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		
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
					

                        @include('includs.patientsidebar')
					
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form action="{{route('updateUserprofile' , $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{$user->image}}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input name="image" type="file" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-12">
												<div class="form-group">
													<label> Name</label>
													<input name="name" type="text" class="form-control" value="{{$user->name}}">
												</div>
											</div>
                                            	<div class="col-12 col-md-12">
												<div class="form-group">
													<label> Email</label>
													<input name="email" type="text" class="form-control" value="{{$user->email}}">
												</div>
											</div>

											</div>
											<div class="col-12 col-md-12">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input name="dateofbirth" type="text" class="form-control datetimepicker" value="{{$user->dateofbirth}}">
													</div>
												</div>
											</div>
											<div class="col-12 col-md-12">
												<div class="form-group">
													<label>Blood Group</label>
													<select name="bloodgroups" class="form-control select">
                                                        <option  disabled > Select Blood Group</option>
														@foreach ($bloodgroups as $bloodgroup)
                                                        <option @selected($user->bloodgroup == $bloodgroup)>{{$bloodgroup}}</option>
                                                            
                                                        @endforeach

													</select>
												
												</div>
											</div>

												<div class="col-12 col-md-12">
												<div class="form-group">
													<label>Country</label>
													<select name="country" class="form-control select">
                                                        <option  disabled > Select Country</option>
														@foreach ($countries as $country)
													<option @selected($user->country == $country)>{{$country}}</option>
														
													@endforeach
											

													</select>
												
												</div>
											</div>
										

											
											<div class="col-12 col-md-12">
												<div class="form-group">
													<label>Mobile</label>
													<input name="phone" type="text" value="{{$user->phone}}" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-12">
												<div class="form-group">
												<label>Address</label>
													<input name="address" type="text" class="form-control" value="{{$user->address}}">
												</div>
											</div>
									
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
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
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Dropzone JS -->
<script src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>
<!-- Bootstrap Tagsinput JS -->
<script src="{{asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<!-- Profile Settings JS -->
<script src="{{asset('assets/js/profile-settings.js')}}"></script>
		<script src="assets/js/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{asset('assets/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Select2 JS -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('assets/js/moment.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
        <script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js')}}"></script>
@endpush