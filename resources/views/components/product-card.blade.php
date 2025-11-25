@props(['product'])

<div class="col-md-3 mb-4">
    <div class="card h-100">
        <a href="{{ route('products.show', $product->slug) }}">
            <img src="{{ $product->image }}" class="card-img-top p-3" alt="{{ $product->name }}" style="height: 200px; object-fit: contain;">
        </a>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate" style="font-size: 1rem;">
                <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">{{ $product->name }}</a>
            </h5>
            <p class="card-text text-danger fw-bold mb-auto">{{ number_format($product->price) }} đ</p>
            <div class="mt-3">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
