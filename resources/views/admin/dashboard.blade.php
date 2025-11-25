@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text fs-2">{{ \App\Models\Order::count() }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <p class="card-text fs-2">{{ \App\Models\Product::count() }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark mb-3">
            <div class="card-body">
                <h5 class="card-title">Pending Orders</h5>
                <p class="card-text fs-2">{{ \App\Models\Order::where('status', 'pending')->count() }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Revenue</h5>
                <p class="card-text fs-2">{{ number_format(\App\Models\Order::where('status', 'delivered')->sum('total_price')) }} đ</p>
            </div>
        </div>
    </div>
</div>
@endsection
