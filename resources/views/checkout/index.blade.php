@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')
<div class="container py-5">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h1 class="fw-bold mb-0">Thanh toán</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-decoration-none">Giỏ hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row g-5">
            <!-- Thông tin giao hàng & thanh toán -->
            <div class="col-lg-8">
                <!-- Thông tin giao hàng -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h4 class="fw-bold mb-0"><i class="bi bi-truck me-2 text-accent"></i>Thông tin giao hàng</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="shipping_name" class="form-label fw-medium">Họ và tên</label>
                                <input type="text" class="form-control bg-light border-0 py-3" id="shipping_name" name="shipping_name" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="shipping_phone" class="form-label fw-medium">Số điện thoại</label>
                                <input type="tel" class="form-control bg-light border-0 py-3" id="shipping_phone" name="shipping_phone" required>
                            </div>
                            <div class="col-md-6">
                                <label for="shipping_email" class="form-label fw-medium">Email</label>
                                <input type="email" class="form-control bg-light border-0 py-3" id="shipping_email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="col-12">
                                <label for="shipping_address" class="form-label fw-medium">Địa chỉ nhận hàng</label>
                                <textarea class="form-control bg-light border-0 py-3" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h4 class="fw-bold mb-0"><i class="bi bi-credit-card me-2 text-accent"></i>Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-grid gap-3">
                            <div class="form-check card-radio p-0">
                                <input class="form-check-input d-none" type="radio" name="payment_method" id="payment_cod" value="cod" checked>
                                <label class="form-check-label d-flex align-items-center p-3 border rounded-3 cursor-pointer" for="payment_cod">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                                        <i class="bi bi-cash fs-4 text-dark"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Thanh toán khi nhận hàng (COD)</h6>
                                        <small class="text-muted">Thanh toán khi nhận được hàng</small>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="bi bi-check-circle-fill text-accent fs-4 check-icon"></i>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check card-radio p-0">
                                <input class="form-check-input d-none" type="radio" name="payment_method" id="payment_bank" value="bank_transfer">
                                <label class="form-check-label d-flex align-items-center p-3 border rounded-3 cursor-pointer" for="payment_bank">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                                        <i class="bi bi-bank fs-4 text-dark"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Chuyển khoản ngân hàng</h6>
                                        <small class="text-muted">Chuyển khoản trực tiếp vào tài khoản của chúng tôi</small>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="bi bi-check-circle-fill text-accent fs-4 check-icon"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tóm tắt đơn hàng -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-light sticky-top" style="top: 100px;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Tóm tắt đơn hàng</h4>
                        
                        <div class="mb-4">
                            @foreach($cart as $id => $details)
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-white rounded-3 p-2 d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                        <img src="{{ \App\Helpers\ImageHelper::display($details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid" style="max-height: 100%;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold text-truncate" style="max-width: 150px;">{{ $details['name'] }}</h6>
                                        <small class="text-muted">SL: {{ $details['quantity'] }}</small>
                                    </div>
                                    <div class="fw-bold">{{ number_format($details['price'] * $details['quantity']) }} đ</div>
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-4">
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Tạm tính</span>
                            <span class="fw-bold">{{ number_format($total) }} đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Vận chuyển</span>
                            <span class="text-success fw-semibold">Miễn phí</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">Tổng cộng</span>
                            <span class="fw-bold fs-4 text-primary">{{ number_format($total) }} đ</span>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill shadow-sm hover-translate">
                            Đặt hàng <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                        
                        <div class="mt-4 text-center">
                            <small class="text-muted"><i class="bi bi-shield-lock me-1"></i> Thanh toán an toàn</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .cursor-pointer { cursor: pointer; }
    .card-radio .form-check-input:checked + .form-check-label {
        border-color: var(--bs-primary) !important;
        background-color: rgba(var(--bs-primary-rgb), 0.05);
    }
    .card-radio .check-icon {
        display: none;
    }
    .card-radio .form-check-input:checked + .form-check-label .check-icon {
        display: block;
    }
    .hover-translate {
        transition: transform 0.2s;
    }
    .hover-translate:hover {
        transform: translateY(-2px);
    }
</style>
@endsection
