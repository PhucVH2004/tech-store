@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none">Cửa Hàng</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->id]) }}" class="text-decoration-none">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-5 mb-5">
        <!-- Product Image -->
        <div class="col-lg-6">
            <div class="position-sticky" style="top: 100px;">
                <div class="card border-0 shadow-sm overflow-hidden rounded-4">
                    <img src="{{ \App\Helpers\ImageHelper::display($product->image) }}" class="img-fluid w-100 object-fit-cover" alt="{{ $product->name }}">
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <div class="mb-4">
                @if($product->brand)
                    <span class="badge bg-accent bg-opacity-10 text-white mb-2 px-3 py-2 rounded-pill fw-semibold">{{ $product->brand }}</span>
                @endif
                <h1 class="fw-bold display-5 mb-3">{{ $product->name }}</h1>
                <div class="d-flex align-items-center gap-3 mb-4">
                    <h2 class="text-accent fw-bold m-0">{{ number_format($product->price, 0, ',', '.') }} đ</h2>
                    @if($product->stock > 0)
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Còn Hàng</span>
                    @else
                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">Hết Hàng</span>
                    @endif
                </div>
                
                <p class="lead text-muted mb-5">{{ Str::limit($product->description, 150) }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex gap-3 mb-5">
                    @csrf
                    <div class="input-group" style="width: 140px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="decrementQuantity()">-</button>
                        <input type="number" name="quantity" id="quantity" class="form-control text-center border-secondary" value="1" min="1" max="{{ $product->stock }}">
                        <button class="btn btn-outline-secondary" type="button" onclick="incrementQuantity()">+</button>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 flex-grow-1" {{ $product->stock == 0 ? 'disabled' : '' }}>
                        <i class="bi bi-cart-plus me-2"></i>Thêm vào Giỏ
                    </button>
                </form>

                <!-- Tabs -->
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill px-4" id="pills-desc-tab" data-bs-toggle="pill" data-bs-target="#pills-desc" type="button" role="tab">Mô Tả</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4" id="pills-specs-tab" data-bs-toggle="pill" data-bs-target="#pills-specs" type="button" role="tab">Thông Số</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-desc" role="tabpanel">
                        <p class="text-muted" style="line-height: 1.8;">{{ $product->description }}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-specs" role="tabpanel">
                        @if($product->specifications)
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach($product->specifications as $key => $value)
                                    <tr>
                                        <th scope="row" class="text-muted w-25 ps-0">{{ $key }}</th>
                                        <td class="fw-medium">{{ $value }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">Không có thông số kỹ thuật.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-5 pt-5 border-top">
        <h3 class="fw-bold mb-4">Có Thể Bạn Sẽ Thích</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $related)
            <div class="col-md-3">
                @include('components.product-card', ['product' => $related])
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function incrementQuantity() {
        var input = document.getElementById('quantity');
        var max = parseInt(input.getAttribute('max'));
        var value = parseInt(input.value);
        if (value < max) {
            input.value = value + 1;
        }
    }

    function decrementQuantity() {
        var input = document.getElementById('quantity');
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }
</script>
@endsection
