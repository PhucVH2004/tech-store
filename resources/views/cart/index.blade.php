@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container py-5" x-data="cart()">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h1 class="fw-bold mb-0">Shopping Cart</h1>
        <span class="badge bg-primary rounded-pill px-3 py-2">{{ count((array) session('cart')) }} Items</span>
    </div>

    @if(session('cart'))
        <div class="row g-5">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="py-3 ps-4 border-0 text-muted small text-uppercase fw-bold">Product</th>
                                    <th scope="col" class="py-3 border-0 text-muted small text-uppercase fw-bold">Price</th>
                                    <th scope="col" class="py-3 border-0 text-muted small text-uppercase fw-bold">Quantity</th>
                                    <th scope="col" class="py-3 border-0 text-muted small text-uppercase fw-bold">Subtotal</th>
                                    <th scope="col" class="py-3 pe-4 border-0 text-end text-muted small text-uppercase fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart') as $id => $details)
                                    <tr class="transition-hover">
                                        <td class="ps-4 py-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="bg-light rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                    <img src="{{ \App\Helpers\ImageHelper::display($details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid" style="max-height: 100%;">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fw-semibold text-dark">{{ $details['name'] }}</h6>
                                                    @if(isset($details['brand']))
                                                        <small class="text-muted">{{ $details['brand'] }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="fw-medium">${{ number_format($details['price'], 2) }}</td>
                                        <td style="width: 150px;">
                                            <form action="{{ route('cart.update', $id) }}" method="POST" id="update-form-{{ $id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <div class="input-group border rounded-pill overflow-hidden" style="width: 140px;">
                                                    <button class="btn btn-light border-0 px-3 hover-bg-gray" type="button" 
                                                        @click="updateQuantity('{{ $id }}', -1)">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                    <input type="number" name="quantity" id="quantity-{{ $id }}" 
                                                        class="form-control border-0 text-center fw-bold" 
                                                        style="background-color: #fff !important; color: #000 !important; -moz-appearance: textfield;"
                                                        value="{{ $details['quantity'] }}" min="1" readonly>
                                                    <button class="btn btn-light border-0 px-3 hover-bg-gray" type="button" 
                                                        @click="updateQuantity('{{ $id }}', 1)">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="fw-bold text-accent">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                        <td class="pe-4 text-end">
                                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-outline-danger btn-sm rounded-circle p-2 hover-scale" data-bs-toggle="tooltip" title="Remove Item">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold text-muted hover-text-primary">
                        <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-light sticky-top" style="top: 100px;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Order Summary</h4>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-bold">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Shipping</span>
                            <span class="text-success fw-semibold">Free</span>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">Total</span>
                            <span class="fw-bold fs-4 text-primary">${{ number_format($total, 2) }}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 btn-lg rounded-pill shadow-sm hover-translate">
                            Proceed to Checkout <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        
                        <div class="mt-4 text-center">
                            <small class="text-muted"><i class="bi bi-shield-lock me-1"></i> Secure Checkout</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 my-5">
            <div class="mb-4">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                    <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-3">Your cart is empty</h2>
            <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm hover-translate">
                Start Shopping
            </a>
        </div>
    @endif
</div>

<!-- Alpine.js Logic -->
<script>
    function cart() {
        return {
            updateQuantity(id, change) {
                let input = document.getElementById('quantity-' + id);
                let currentValue = parseInt(input.value);
                let newValue = currentValue + change;
                
                if (newValue >= 1) {
                    input.value = newValue;
                    // Submit form automatically
                    document.getElementById('update-form-' + id).submit();
                }
            }
        }
    }
</script>

<style>
    .hover-bg-gray:hover {
        background-color: #e9ecef !important;
    }
    .hover-scale {
        transition: transform 0.2s;
    }
    .hover-scale:hover {
        transform: scale(1.1);
    }
    .hover-translate {
        transition: transform 0.2s;
    }
    .hover-translate:hover {
        transform: translateY(-2px);
    }
    .hover-text-primary:hover {
        color: var(--bs-primary) !important;
    }
    .transition-hover {
        transition: background-color 0.2s;
    }
    /* Hide number input arrows */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>
@endsection
