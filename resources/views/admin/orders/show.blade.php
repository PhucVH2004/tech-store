@extends('admin.layouts.app')

@section('title', 'Order #' . $order->id)

@section('content')
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
            <div class="card-header">Order Info</div>
            <div class="card-body">
                <p><strong>User:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
                <p><strong>Address:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                <hr>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Update Status</label>
                        <select name="status" class="form-select">
                            @foreach(['pending', 'confirmed', 'shipping', 'delivered', 'cancelled'] as $status)
                                <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
