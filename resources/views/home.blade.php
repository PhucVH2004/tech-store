@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="hero-section mb-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-accent bg-opacity-10 text-accent mb-3 px-3 py-2 rounded-pill fw-semibold">New Arrival</span>
                <h1 class="display-3 fw-bold mb-4" style="letter-spacing: -1px;">Discover the Future of <span class="text-accent">Technology</span></h1>
                <p class="lead text-muted mb-4">Experience the latest in innovation with our premium collection of smartphones, laptops, and accessories. Upgrade your lifestyle today.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg rounded-pill px-5">Shop Now</a>
                    <a href="#featured" class="btn btn-outline-primary btn-lg rounded-pill px-5">Explore</a>
                </div>https://cdn2.fptshop.com.vn/unsafe/2024_2_19_638439073803645218_poster-thoi-trang-la-gi-bi-kip-thiet-ke-poster-thoi-trang-an-tuong.png
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="bg-accent position-absolute top-50 start-50 translate-middle rounded-circle opacity-10" style="width: 500px; height: 500px; filter: blur(50px); z-index: -1;"></div>
                    <img src="https://cdn.tgdd.vn/Products/Images/42/329149/iphone-16-pro-max-titan-sa-mac-1-600x600.jpg" alt="Hero Image" class="img-fluid position-relative" style="transform: scale(1.1);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="mb-5 py-4 bg-white border-top border-bottom">
    <div class="container">
        <p class="text-center text-muted small fw-bold text-uppercase tracking-wide mb-4">Trusted by Top Brands</p>
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
                <h2 class="fw-bold mb-1">Featured Products</h2>
                <p class="text-muted m-0">Handpicked selection just for you</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold">View All <i class="bi bi-arrow-right"></i></a>
        </div>
        
        <div class="row g-4">
            @php
                $featuredProducts = \App\Models\Product::where('is_featured', true)->take(4)->get();
            @endphp
            
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
                <h2 class="fw-bold mb-1">New Arrivals</h2>
                <p class="text-muted m-0">The latest gadgets in our store</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold">View All <i class="bi bi-arrow-right"></i></a>
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

<!-- Newsletter -->
<section class="py-5 bg-primary text-white rounded-4 mx-3 mx-md-5 mb-5 position-relative overflow-hidden">
    <div class="position-absolute top-0 end-0 bg-accent opacity-25 rounded-circle" style="width: 300px; height: 300px; transform: translate(30%, -30%);"></div>
    <div class="container text-center position-relative">
        <h2 class="fw-bold mb-3">Join Our Newsletter</h2>
        <p class="mb-4 text-light opacity-75">Get the latest updates, exclusive offers, and tech news delivered to your inbox.</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="d-flex gap-2">
                    <input type="email" class="form-control form-control-lg border-0" placeholder="Enter your email address">
                    <button class="btn btn-accent btn-lg fw-semibold" style="background-color: var(--accent); color: white;">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
