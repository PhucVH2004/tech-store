@extends('admin.layouts.app')

@section('title', 'Đơn Hàng')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Danh Sách Đơn Hàng</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Khách Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Ngày Đặt</th>
                        <th class="text-end pe-4">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="ps-4 text-muted">#{{ $order->id }}</td>
                        <td class="fw-medium">{{ $order->user->name }}</td>
                        <td class="fw-bold text-primary">{{ number_format($order->total_price) }} đ</td>
                        <td>
                            <span class="badge rounded-pill bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'primary')) }}">
                                @if($order->status == 'pending')
                                    Chờ xử lý
                                @elseif($order->status == 'confirmed')
                                    Đã xác nhận
                                @elseif($order->status == 'shipping')
                                    Đang giao
                                @elseif($order->status == 'delivered')
                                    Đã giao
                                @elseif($order->status == 'cancelled')
                                    Đã hủy
                                @else
                                    {{ ucfirst($order->status) }}
                                @endif
                            </span>
                        </td>
                        <td class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-light btn-sm text-primary" data-bs-toggle="tooltip" title="Xem chi tiết">
                                <i class="bi bi-eye"></i> Xem
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white py-3">
        {{ $orders->links() }}
    </div>
</div>
@endsection
