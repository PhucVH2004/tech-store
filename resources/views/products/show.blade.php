@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="card mb-5">
        <div class="row g-0">
            <div class="col-md-5 p-4 text-center">
                <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}" style="max-height: 400px;">
            </div>
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <p class="text-muted">Category: <a href="{{ route('products.index', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                    <h3 class="text-danger fw-bold mb-3">{{ number_format($product->price) }} đ</h3>
                    
                    <p class="card-text">{{ $product->description }}</p>
                    
                    <div class="d-flex align-items-center mt-4">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control me-3" style="width: 80px;">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                        </form>
                    </div>
                    
                    <div class="mt-3">
                        <small class="text-muted">Stock: {{ $product->stock }} available</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mb-4">Related Products</h3>
    <div class="row">
        @foreach($relatedProducts as $related)
            <x-product-card :product="$related" />
        @endforeach
    </div>
</div>
@endsection
