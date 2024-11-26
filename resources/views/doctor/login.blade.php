@extends('layouts.main')

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Login <span>Doccure</span> Doctor</h3>
                            </div>
                            <form method="POST" action="{{ route('doctorloginpage') }}">
                                @csrf
                                <div class="form-group form-focus">
                                    <input id="email" type="email" 
                                        class="form-control floating @error('email') is-invalid @enderror" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required 
                                        autocomplete="email" 
                                        autofocus>
                                    <label class="focus-label">Email</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group form-focus">
                                    <input id="password" 
                                        type="password" 
                                        class="form-control floating @error('password') is-invalid @enderror" 
                                        name="password" 
                                        required 
                                        autocomplete="current-password">
                                    <label class="focus-label">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Remember Me Option -->
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" 
                                            class="custom-control-input" 
                                            name="remember" 
                                            id="remember" 
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>

                                <!-- Forgot Password Link -->
                                @if (Route::has('password.request'))
                                    <div class="text-center mt-3">
                                        <a class="forgot-link" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
                                    </div>
                                @endif

                                <div class="text-center dont-have mt-3">
                                    Don't have an account? 
                                    <a href="{{route('doctorregisterpage')}}">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection