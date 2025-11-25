@extends('admin.layouts.app')

@section('title', 'Bảng Điều Khiển')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Tổng số đơn hàng</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Order::count() }}</h2>
                    </div>
                    <i class="bi bi-cart-check fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Tổng sản phẩm</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Product::count() }}</h2>
                    </div>
                    <i class="bi bi-box-seam fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Đơn hàng chờ xử lý</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Order::where('status', 'pending')->count() }}</h2>
                    </div>
                    <i class="bi bi-hourglass-split fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Tổng doanh thu</h6>
                        <h2 class="mt-2 mb-0">{{ number_format(\App\Models\Order::where('status', 'delivered')->sum('total_price')) }} đ</h2>
                    </div>
                    <i class="bi bi-currency-dollar fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Biểu đồ đơn hàng (7 ngày gần nhất)</div>
            <div class="card-body">
                <canvas id="ordersChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Đơn hàng gần đây</div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach($recentOrders as $order)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <span class="fw-bold">#{{ $order->id }}</span>
                            <small class="d-block text-muted">{{ $order->user->name }}</small>
                        </div>
                        <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : 'secondary') }}">
                            @if($order->status == 'pending')
                                Chờ xử lý
                            @elseif($order->status == 'delivered')
                                Đã giao
                            @else
                                {{ ucfirst($order->status) }}
                            @endif
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">Xem tất cả đơn hàng</a>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: 'Đơn hàng',
                data: {!! json_encode($orderCounts) !!},
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection
