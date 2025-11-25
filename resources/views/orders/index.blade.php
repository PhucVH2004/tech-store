@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="container">
    <h2 class="mb-4">My Orders</h2>
    <div class="card">
        <div class="card-body">
            @if($orders->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'primary')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ number_format($order->total_price) }} đ</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
            @else
            <div class="text-center py-4">
                <p>You have no orders yet.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Start Shopping</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
