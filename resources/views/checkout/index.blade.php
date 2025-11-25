@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <h2 class="mb-4">Checkout</h2>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Shipping Information</div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="shipping_name" class="form-control" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="shipping_phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="shipping_address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select" required>
                                <option value="cod">Cash on Delivery (COD)</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush mb-3">
                        @foreach($cart as $item)
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $item['name'] }}</h6>
                                <small class="text-muted">Qty: {{ $item['quantity'] }}</small>
                            </div>
                            <span class="text-muted">{{ number_format($item['price'] * $item['quantity']) }} đ</span>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (VND)</span>
                            <strong>{{ number_format($total) }} đ</strong>
                        </li>
                    </ul>
                    <div class="d-grid">
                        <button type="submit" form="checkoutForm" class="btn btn-primary btn-lg">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
