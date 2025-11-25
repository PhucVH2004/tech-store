@extends('layouts.app')

@section('title', 'Đăng Nhập')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
        <div class="col-lg-6 d-none d-lg-block position-relative">
            <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?q=80&w=2071&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Login Background">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                <div class="text-white text-center p-5">
                    <h1 class="display-4 fw-bold mb-4">Chào Mừng Trở Lại</h1>
                    <p class="lead">Đăng nhập để quản lý đơn hàng, theo dõi vận chuyển và khám phá những sản phẩm công nghệ mới nhất.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
            <div class="p-5 w-100" style="max-width: 500px;">
                <div class="mb-5 text-center">
                    <h2 class="fw-bold text-primary"><i class="bi bi-cpu-fill me-2"></i>TechStore</h2>
                    <p class="text-muted">Vui lòng đăng nhập tài khoản</p>
                </div>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-medium">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-start-0 ps-0 @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium">Mật Khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-start-0 ps-0 @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted small" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <a href="#" class="text-decoration-none small text-accent">Quên mật khẩu?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill mb-4">Đăng Nhập</button>
                    
                    <div class="text-center">
                        <p class="text-muted mb-0">Chưa có tài khoản? <a href="{{ route('register') }}" class="text-accent fw-semibold text-decoration-none">Tạo Tài Khoản</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
