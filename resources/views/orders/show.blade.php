@extends('layouts.app')

@section('title', 'Chi Tiết Đơn Hàng')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Đơn Hàng #{{ $order->id }}</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Quay Lại Danh Sách</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Sản Phẩm Đặt Hàng</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>SL</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ \App\Helpers\ImageHelper::display($item->product->image) }}" alt="" width="50" class="me-2">
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
                                <th colspan="3" class="text-end">Tổng Cộng:</th>
                                <th>{{ number_format($order->total_price) }} đ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Thông Tin Đơn Hàng</div>
                <div class="card-body">
                    <p><strong>Ngày Tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Trạng Thái:</strong> 
                        <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'primary')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                    <p><strong>Phương Thức Thanh Toán:</strong> {{ ucfirst($order->payment_method) }}</p>
                    <hr>
                    <h5>Thông Tin Giao Hàng</h5>
                    <p><strong>Họ Tên:</strong> {{ $order->shipping_name }}</p>
                    <p><strong>Số Điện Thoại:</strong> {{ $order->shipping_phone }}</p>
                    <p><strong>Địa Chỉ:</strong> {{ $order->shipping_address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
