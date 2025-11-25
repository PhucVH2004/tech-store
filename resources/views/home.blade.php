@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<!-- Hero Section -->
<section class="hero-section mb-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-accent bg-opacity-10 text-white mb-3 px-3 py-2 rounded-pill fw-semibold">Hàng Mới Về</span>
                <h1 class="display-3 fw-bold mb-4" style="letter-spacing: -1px;">Khám Phá Tương Lai của <span class="text-accent">Công Nghệ</span></h1>
                <p class="lead text-muted mb-4">Trải nghiệm sự đổi mới mới nhất với bộ sưu tập smartphone, laptop và phụ kiện cao cấp của chúng tôi. Nâng tầm phong cách sống ngay hôm nay.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg rounded-pill px-5">Mua Ngay</a>
                    <a href="#featured" class="btn btn-outline-primary btn-lg rounded-pill px-5">Khám Phá</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="bg-accent position-absolute top-50 start-50 translate-middle rounded-circle opacity-10" style="width: 500px; height: 500px; filter: blur(50px); z-index: -1;"></div>
                    <img src="https://static.wixstatic.com/media/f758ab_2a779380829c4aec8ed3e642df5f3d07~mv2.png/v1/fill/w_521,h_328,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/Slider1-Image-EN.png" alt="Hero Image" class="img-fluid position-relative" style="transform: scale(1.1);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="mb-5 py-4 bg-white border-top border-bottom">
    <div class="container">
        <p class="text-center text-muted small fw-bold text-uppercase tracking-wide mb-4">Được Tin Dùng Bởi Các Thương Hiệu Hàng Đầu</p>
        <div class="d-flex justify-content-center flex-wrap gap-5 align-items-center opacity-50">
            <h4 class="m-0 fw-bold text-dark">Apple</h4>
            <h4 class="m-0 fw-bold text-dark">Samsung</h4>
            <h4 class="m-0 fw-bold text-dark">Xiaomi</h4>
            <h4 class="m-0 fw-bold text-dark">Dell</h4>
            <h4 class="m-0 fw-bold text-dark">Sony</h4>
            <h4 class="m-0 fw-bold text-dark">Asus</h4>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section id="featured" class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold mb-1">Sản Phẩm Nổi Bật</h2>
                <p class="text-muted m-0">Lựa chọn tinh tế dành riêng cho bạn</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold">Xem Tất Cả <i class="bi bi-arrow-right"></i></a>
        </div>
        
        <div class="row g-4">

            
            @foreach($featuredProducts as $product)
            <div class="col-md-3">
                @include('components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- New Arrivals -->
<section class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold mb-1">Hàng Mới Về</h2>
                <p class="text-muted m-0">Những thiết bị mới nhất tại cửa hàng</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold">Xem Tất Cả <i class="bi bi-arrow-right"></i></a>
        </div>
        
        <div class="row g-4">
            @foreach($newArrivals as $product)
            <div class="col-md-3">
                @include('components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
