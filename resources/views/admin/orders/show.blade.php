@extends('admin.layouts.app')

@section('title', 'Chi Tiết Đơn Hàng #' . $order->id)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Sản Phẩm Đã Mua</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th class="text-end pe-4">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ \App\Helpers\ImageHelper::display($item->product->image) }}" alt="" width="50" height="50" class="rounded me-3 border" style="object-fit: cover;">
                                        <div>
                                            <div class="fw-medium">{{ $item->product->name }}</div>
                                            <small class="text-muted">{{ $item->product->category->name ?? '' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($item->price) }} đ</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-end pe-4 fw-bold">{{ number_format($item->price * $item->quantity) }} đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <td colspan="3" class="text-end fw-bold py-3">Tổng Cộng:</td>
                                <td class="text-end pe-4 fw-bold text-primary fs-5 py-3">{{ number_format($order->total_price) }} đ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Thông Tin Đơn Hàng</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted small text-uppercase fw-bold">Khách Hàng</label>
                    <div class="fw-medium">{{ $order->user->name }}</div>
                    <div class="text-muted">{{ $order->user->email }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-muted small text-uppercase fw-bold">Giao Hàng Đến</label>
                    <div class="fw-medium">{{ $order->shipping_name }}</div>
                    <div>{{ $order->shipping_phone }}</div>
                    <div class="text-muted">{{ $order->shipping_address }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-muted small text-uppercase fw-bold">Phương Thức Thanh Toán</label>
                    <div>
                        @if($order->payment_method == 'cod')
                            <span class="badge bg-secondary">Thanh toán khi nhận hàng (COD)</span>
                        @elseif($order->payment_method == 'bank_transfer')
                            <span class="badge bg-info text-dark">Chuyển khoản ngân hàng</span>
                        @else
                            {{ ucfirst($order->payment_method) }}
                        @endif
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Cập Nhật Trạng Thái</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                            <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao hàng</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Cập Nhật Trạng Thái</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
