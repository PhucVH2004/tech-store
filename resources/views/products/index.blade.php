@extends('layouts.app')

@section('title', 'Cửa Hàng')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 100px; z-index: 900;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Bộ Lọc</h5>
                    
                    <form action="{{ route('products.index') }}" method="GET">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <!-- Categories -->
                        <div class="mb-4">
                            <h6 class="fw-semibold mb-3">Danh Mục</h6>
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="cat_all" value="" {{ !request('category') ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="cat_all">Tất Cả Danh Mục</label>
                                </div>
                                @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="cat_{{ $category->id }}" value="{{ $category->id }}" {{ request('category') == $category->id ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="cat_{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Brands -->
                        <div class="mb-4">
                            <h6 class="fw-semibold mb-3">Thương Hiệu</h6>
                            <div class="d-flex flex-column gap-2" style="max-height: 200px; overflow-y: auto;">
                                @foreach($brands as $brand)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand[]" id="brand_{{ $brand }}" value="{{ $brand }}" {{ in_array($brand, (array)request('brand')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="brand_{{ $brand }}">{{ $brand }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-4">
                            <h6 class="fw-semibold mb-3">Khoảng Giá</h6>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Thấp nhất" value="{{ request('min_price') }}">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Cao nhất" value="{{ request('max_price') }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Áp Dụng Bộ Lọc</button>
                        @if(request()->hasAny(['category', 'brand', 'min_price', 'max_price', 'search']))
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100 rounded-pill mt-2">Xóa Tất Cả</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">
                    @if(request('search'))
                        Kết quả tìm kiếm cho "{{ request('search') }}"
                    @elseif(request('category'))
                        {{ $categories->find(request('category'))->name }}
                    @else
                        Tất Cả Sản Phẩm
                    @endif
                    <span class="text-muted fs-6 fw-normal ms-2">({{ $products->total() }} sản phẩm)</span>
                </h4>
                
                <!-- Sort (Optional, can be added later) -->
                <!-- <select class="form-select w-auto border-0 shadow-sm">
                    <option>Sắp xếp: Mới nhất</option>
                    <option>Giá: Thấp đến Cao</option>
                    <option>Giá: Cao đến Thấp</option>
                </select> -->
            </div>

            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-4">
                        @include('components.product-card', ['product' => $product])
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="mb-3">
                            <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                        </div>
                        <h5>Không tìm thấy sản phẩm</h5>
                        <p class="text-muted">Hãy thử thay đổi bộ lọc hoặc tìm kiếm khác.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill px-4">Xem Tất Cả Sản Phẩm</a>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-5 d-flex justify-content-center">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
