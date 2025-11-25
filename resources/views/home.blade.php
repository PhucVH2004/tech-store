@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <!-- Banner Carousel -->
    <div id="mainCarousel" class="carousel slide mb-5 shadow rounded overflow-hidden" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.tgdd.vn/2023/11/banner/1920x600-1920x600-3.jpg" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.tgdd.vn/2023/11/banner/1920x600-1920x600-4.jpg" class="d-block w-100" alt="Banner 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- New Products -->
    <h3 class="mb-4 border-start border-4 border-primary ps-3">New Arrivals</h3>
    <div class="row">
        @foreach($newProducts as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

    <!-- Best Sellers (Random for now as we don't have sales data yet) -->
    <h3 class="my-4 border-start border-4 border-danger ps-3">Best Sellers</h3>
    <div class="row">
        @foreach($bestSellers as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
</div>
@endsection
