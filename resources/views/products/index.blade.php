@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Categories</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('products.index') }}" class="text-decoration-none {{ !request('category') ? 'fw-bold' : '' }}">All Products</a>
                    </li>
                    @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none {{ request('category') == $category->slug ? 'fw-bold' : '' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="mb-4">
                <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" class="form-control me-2" placeholder="Search products..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </form>
            </div>

            <div class="row">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-12 text-center py-5">
                        <h3>No products found.</h3>
                    </div>
                @endforelse
            </div>
            
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
