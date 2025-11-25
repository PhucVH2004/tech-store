@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Order #{{ $order->id }}</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Back to Orders</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Order Items</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item->product->image }}" alt="" width="50" class="me-2">
                                        {{ $item->product->name }}
                                    </div>
                                </td>
                                <td>{{ number_format($item->price) }} đ</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity) }} đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total:</th>
                                <th>{{ number_format($order->total_price) }} đ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Order Information</div>
                <div class="card-body">
                    <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'primary')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                    <hr>
                    <h5>Shipping Details</h5>
                    <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
                    <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
                    <p><strong>Address:</strong> {{ $order->shipping_address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
