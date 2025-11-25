@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container">
    <h2 class="mb-4">Shopping Cart</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $details['image'] }}" width="50" class="me-3" alt="">
                                            {{ $details['name'] }}
                                        </div>
                                    </td>
                                    <td>{{ number_format($details['price']) }} đ</td>
                                    <td>
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control form-control-sm me-2" style="width: 60px;" min="1" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td>{{ number_format($details['price'] * $details['quantity']) }} đ</td>
                                    <td>
                                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Summary</h4>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Total:</span>
                            <span class="fw-bold fs-5">{{ number_format($total) }} đ</span>
                        </div>
                        <div class="d-grid">
                            <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
                        </div>
                        <div class="d-grid mt-2">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <h3>Your cart is empty</h3>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
