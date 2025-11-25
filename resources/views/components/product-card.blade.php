@props(['product'])

<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card-hover">
    <div class="position-relative">
        <a href="{{ route('products.show', $product->slug) }}" class="d-block overflow-hidden">
            <img src="{{ \App\Helpers\ImageHelper::display($product->image) }}" class="card-img-top p-4 transition-transform" alt="{{ $product->name }}" style="height: 220px; object-fit: contain;">
        </a>
        @if($product->is_featured)
            <span class="position-absolute top-0 start-0 m-3 badge bg-danger rounded-pill">Featured</span>
        @endif
    </div>
    <div class="card-body d-flex flex-column p-4">
        @if($product->brand)
            <small class="text-muted mb-2 text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">{{ $product->brand }}</small>
        @endif
        <h5 class="card-title mb-2">
            <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark fw-bold text-truncate-2" style="line-height: 1.4;">{{ $product->name }}</a>
        </h5>
        <div class="mt-auto pt-3 d-flex align-items-center justify-content-between">
            <span class="text-accent fw-bold fs-5">${{ number_format($product->price, 2) }}</span>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light rounded-circle p-2 text-primary hover-scale" data-bs-toggle="tooltip" title="Add to Cart">
                    <i class="bi bi-cart-plus fs-5"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    .product-card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .transition-transform {
        transition: transform 0.5s ease;
    }
    .product-card-hover:hover .transition-transform {
        transform: scale(1.05);
    }
    .hover-scale {
        transition: transform 0.2s;
    }
    .hover-scale:hover {
        transform: scale(1.1);
        background-color: var(--accent) !important;
        color: white !important;
    }
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
