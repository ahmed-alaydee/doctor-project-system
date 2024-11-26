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
         @include('includs.patientsidebar')
         <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="card">
               <div class="card-body pt-0">
                  <!-- Tab Menu -->
                  <nav class="user-tabs mb-4">
                     <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                           <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
                        </li>
                     </ul>
                  </nav>
                  <!-- /Tab Menu -->
                  <!-- Tab Content -->
                  <div class="tab-content pt-0">
                     <!-- Appointment Tab -->
                     <div id="pat_appointments" class="tab-pane fade show active">
                        <div class="card card-table mb-0">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-hover table-center mb-0">
                                    <thead>
                                       <tr>
                                          <th>Doctor</th>
                                          <th>Appt Date</th>
                                          <th>Booking Date</th>
                                          <th>Price</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($appointments as $appointment)
                                       <tr>
                                          <td>
                                             <h2 class="table-avatar">
                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                <img class="avatar-img rounded-circle" src="{{$appointment->doctor->image}}" alt="User Image">
                                                </a>
                                                <a href="doctor-profile.html">{{$appointment->doctor->name}} <span>{{$appointment->doctor->specialize}}</span></a>
                                             </h2>
                                          </td>
                                          <td>{{$appointment->date}} <span class="d-block text-info">{{date('h:i A', strtotime($appointment->time))}} </span></td>
                                          <td>{{$appointment->created_at->diffForHumans()}}</td>
                                          <td>${{$appointment->doctor->price}}</td>
                                       <td>
    @if ($appointment->status == "pending")
        <span class="badge badge-pill bg-warning-light">{{$appointment->status}}</span>
    @endif

    @if ($appointment->status == 'accept')
        <span class="badge badge-pill bg-success-light">{{$appointment->status}}</span>
    @endif	

    @if ($appointment->status == 'cancel')
        <span class="badge badge-pill bg-danger-light">{{$appointment->status}}</span>
    @endif
</td>
                                          <td class="text-right">
                                             <div class="table-action">
                                                <a href="{{ route('appointment.cancel',$appointment->doctor->id) }}" 
                                                   class="btn btn-sm bg-danger-light"
                                                   onclick="return confirm('ملحوظه اذا تم الغاء الموعد لن تقدر الحجز مع هذا الدكتور مره اخري هل تريد الالغاء')">
                                                <i class="far fa-trash-alt"></i> Cancel
                                                </a>
                                             </div>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /Appointment Tab -->
                  </div>
                  <!-- Tab Content -->
               </div>
            </div>
         </div>
      </div>
   </div>    
</div>
<!-- /Page Content -->
@endsection