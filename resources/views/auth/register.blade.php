@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
        <div class="col-lg-6 d-none d-lg-block position-relative order-lg-2">
            <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=2070&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Register Background">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                <div class="text-white text-center p-5">
                    <h1 class="display-4 fw-bold mb-4">Join TechStore</h1>
                    <p class="lead">Create an account to unlock exclusive deals, faster checkout, and personalized recommendations.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white order-lg-1">
            <div class="p-5 w-100" style="max-width: 500px;">
                <div class="mb-5 text-center">
                    <h2 class="fw-bold text-primary"><i class="bi bi-cpu-fill me-2"></i>TechStore</h2>
                    <p class="text-muted">Create your new account</p>
                </div>
                
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-medium">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" name="name" class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror" placeholder="John Doe" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-start-0 ps-0 @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-start-0 ps-0 @error('password') is-invalid @enderror" placeholder="Create a password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock-fill text-muted"></i></span>
                            <input type="password" name="password_confirmation" class="form-control bg-light border-start-0 ps-0" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill mb-4">Create Account</button>
                    
                    <div class="text-center">
                        <p class="text-muted mb-0">Already have an account? <a href="{{ route('login') }}" class="text-accent fw-semibold text-decoration-none">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
