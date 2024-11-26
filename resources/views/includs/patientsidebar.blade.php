	<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{Auth::user()->image}}" alt="">
										</a>
										<div class="profile-det-info">
											<h3>{{Auth::user()->name}}</h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i>{{Auth::user()->dateofbirth}}, <span id="age"></span> years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{Auth::user()->address}}</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="{{route('home')}}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="{{route('patientdoctors')}}">
													<i class="fas fa-user-md"></i>
													<span>Doctors</span>
												</a>
											</li>
											<li>
												<a href="{{route('patientprofile')}}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->
@push('js')
<script>
    function calculateAge(dateString) {
        // تحويل التاريخ من تنسيق "dd/mm/yyyy" إلى تنسيق صالح
        const [day, month, year] = dateString.split('/');
        const birthDate = new Date(year, month - 1, day); // نطرح 1 من الشهر لأن الأشهر في JavaScript تبدأ من 0
        
        const today = new Date();
        
        let age = today.getFullYear() - birthDate.getFullYear();
        
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        
        return age;
    }

    $(document).ready(function() {
        const userDateOfBirth = '{{ Auth::user()->dateofbirth }}';
        console.log('تاريخ الميلاد:', userDateOfBirth);
        
        if (userDateOfBirth) {
            const age = calculateAge(userDateOfBirth);
            console.log('العمر المحسوب:', age);
            $('#age').text(age);
        } else {
            console.error("تاريخ ميلاد المستخدم غير متوفر");
        }
    });
</script>
@endpush