@extends('layouts.app')

@section('title', 'Đơn Hàng Của Tôi')

@section('content')
<div class="container">
    <h2 class="mb-4">Đơn Hàng Của Tôi</h2>
    <div class="card">
        <div class="card-body">
            @if($orders->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Ngày</th>
                        <th>Trạng Thái</th>
                        <th>Tổng</th>
                        <th>Thao Tác</th>
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
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">Xem Chi Tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
            @else
            <div class="text-center py-4">
                <p>Bạn chưa có đơn hàng nào.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Mua Sắm Ngay</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
