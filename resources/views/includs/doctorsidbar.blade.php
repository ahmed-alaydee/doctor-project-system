	<!-- Profile Sidebar -->
	<div class="profile-sidebar">
	    <div class="widget-profile pro-widget-content">
	        <div class="profile-info-widget">
	            <a href="#" class="booking-doc-img">
	                <img src="{{Auth::guard('doctor')->user()->image}}" alt="User Image">
	            </a>
	            <div class="profile-det-info">
	                <h3>{{Auth::guard('doctor')->user()->name}}</h3>

	                <div class="patient-details">
	                    <h5 class="mb-0">{{Auth::guard('doctor')->user()->specialize}}</h5>
	                </div>
					<hr>
					  <div class="patient-details">
	                    <h5 class="mb-0">Phone:{{Auth::guard('doctor')->user()->phone}}</h5>
	                </div>
					<hr>
					  <div class="patient-details">
	                    <h5 class="mb-0">Location:{{Auth::guard('doctor')->user()->address}}</h5>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="dashboard-widget">
	        <nav class="dashboard-menu">
	            <ul>

	                <li>
	                    <a href="{{route('doctorhome')}}">
	                        <i class="fas fa-columns"></i>
	                        <span>Dashboard</span>
	                    </a>
	                </li>
	                <li>

	                    <a href="">
	                        <i class="fas fa-calendar-check"></i>
	                        <span>Appointments</span>
	                    </a>
	                </li>


	                <li>
	                    <a href="{{route('doctorprofile')}}">
	                        <i class="fas fa-user-cog"></i>
	                        <span>Profile Settings</span>
	                    </a>
	                </li>

	                <li>
	                    <a href="{{route('doctorlogout')}}">
	                        <i class="fas fa-sign-out-alt"></i>
	                        <span>Logout</span>
	                    </a>
	                </li>
	            </ul>
	        </nav>
	    </div>
	</div>
	<!-- /Profile Sidebar -->