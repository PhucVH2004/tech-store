@extends('admin.layouts.app')

@section('title', 'Bảng Điều Khiển')

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0 opacity-75">Tổng số đơn hàng</h6>
                        <h2 class="mt-2 mb-0 fw-bold">{{ \App\Models\Order::count() }}</h2>
                    </div>
                    <i class="bi bi-cart-check fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0 opacity-75">Tổng sản phẩm</h6>
                        <h2 class="mt-2 mb-0 fw-bold">{{ \App\Models\Product::count() }}</h2>
                    </div>
                    <i class="bi bi-box-seam fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0 opacity-75">Đơn hàng chờ xử lý</h6>
                        <h2 class="mt-2 mb-0 fw-bold">{{ \App\Models\Order::where('status', 'pending')->count() }}</h2>
                    </div>
                    <i class="bi bi-hourglass-split fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0 opacity-75">Tổng doanh thu</h6>
                        <h2 class="mt-2 mb-0 fw-bold">{{ number_format(\App\Models\Order::where('status', 'delivered')->sum('total_price')) }} đ</h2>
                    </div>
                    <i class="bi bi-currency-dollar fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4 g-4">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Biểu đồ đơn hàng (7 ngày gần nhất)</h5>
            </div>
            <div class="card-body">
                <canvas id="ordersChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Đơn hàng gần đây</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach($recentOrders as $order)
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <span class="fw-bold text-primary">#{{ $order->id }}</span>
                            <small class="d-block text-muted">{{ $order->user->name }}</small>
                        </div>
                        <span class="badge rounded-pill bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : 'secondary') }}">
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
            <div class="card-footer bg-white text-center py-3">
                <a href="{{ route('admin.orders.index') }}" class="text-decoration-none fw-medium">Xem tất cả đơn hàng <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: 'Đơn hàng',
                data: {!! json_encode($orderCounts) !!},
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#4f46e5',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#4f46e5'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1e293b',
                    padding: 12,
                    titleFont: { size: 13 },
                    bodyFont: { size: 13 },
                    cornerRadius: 8,
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: { family: "'Plus Jakarta Sans', sans-serif" }
                    },
                    grid: {
                        borderDash: [5, 5],
                        color: '#e2e8f0'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: { family: "'Plus Jakarta Sans', sans-serif" }
                    }
                }
            }
        }
    });
</script>
@endsection
