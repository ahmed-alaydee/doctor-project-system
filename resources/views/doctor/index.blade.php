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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3>{{$totalPatients}}</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												
												
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3>{{$appointments->count()}}</h3>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointments">
							
										@foreach ($appointments as $appointment )
										<!-- Appointment List -->
										<div class="appointment-list">
											<div class="profile-info-widget">
												<a href="patient-profile.html" class="booking-doc-img">
													<img src="{{$appointment->user->image}}" alt="User Image">
												</a>
												<div class="profile-det-info">
													<h3><a href="patient-profile.html">{{$appointment->user->name}}</a></h3>
													<div class="patient-details">
														<h5><i class="far fa-clock"></i> {{date('h:i A', strtotime($appointment->user->time))}},<br>{{$appointment->user->dateofbirth}}</h5>
														<h5><i class="fas fa-map-marker-alt"></i> {{$appointment->user->address}}</h5>
														<h5><i class="fas fa-envelope"></i> {{$appointment->user->email}}</h5>
														<h5 class="mb-0"><i class="fas fa-phone"></i> {{$appointment->user->phone}}</h5>
													</div>
												</div>
											</div>
											<div class="appointment-action">
												
												<a href="{{route('acceptappointnet',$appointment->id)}}" class="btn btn-sm bg-success-light">
													<i class="fas fa-check"></i> Accept
												</a>
												<a href="{{route('cancelappointnet', $appointment->id)}}" class="btn btn-sm bg-danger-light">
													<i class="fas fa-times"></i> Cancel
												</a>
											</div>
										</div>
										<!-- /Appointment List -->
										
										@endforeach
									
										
									</div>
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
		
		<!-- Circle Progress JS -->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
		
		<!-- Custom JS -->
    
@endpush