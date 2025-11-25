@extends('admin.layouts.app')

@section('title', 'Sửa Sản Phẩm')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Cập Nhật Sản Phẩm</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-medium">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required placeholder="Nhập tên sản phẩm">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Danh Mục</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Chọn Danh Mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Giá</label>
                    <div class="input-group">
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required placeholder="0">
                        <span class="input-group-text">VNĐ</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Kho</label>
                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Thương Hiệu</label>
                    <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" placeholder="Nhập thương hiệu">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Sản Phẩm Nổi Bật
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-medium">Hình Ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if($product->image)
                        <div class="mt-2">
                            <img src="{{ \App\Helpers\ImageHelper::display($product->image) }}" alt="Current Image" class="rounded border" width="100">
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-medium">Mô Tả</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Nhập mô tả sản phẩm">{{ $product->description }}</textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-medium">Thông Số Kỹ Thuật</label>
                    <div id="specs-container" class="bg-light p-3 rounded mb-3">
                        @if($product->specifications)
                            @foreach($product->specifications as $key => $value)
                            <div class="row mb-2 spec-row">
                                <div class="col-5">
                                    <input type="text" name="specifications[keys][]" class="form-control" value="{{ $key }}" placeholder="Tên thông số">
                                </div>
                                <div class="col-5">
                                    <input type="text" name="specifications[values][]" class="form-control" value="{{ $value }}" placeholder="Giá trị">
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-danger remove-spec"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="row mb-2 spec-row">
                                <div class="col-5">
                                    <input type="text" name="specifications[keys][]" class="form-control" placeholder="Tên thông số (VD: Màn hình)">
                                </div>
                                <div class="col-5">
                                    <input type="text" name="specifications[values][]" class="form-control" placeholder="Giá trị (VD: 6.1 inch)">
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-danger remove-spec"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm" id="add-spec"><i class="bi bi-plus-lg"></i> Thêm Thông Số</button>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-pill">Cập Nhật</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-light px-4 rounded-pill ms-2">Hủy</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-spec').addEventListener('click', function() {
        const container = document.getElementById('specs-container');
        const row = document.createElement('div');
        row.className = 'row mb-2 spec-row';
        row.innerHTML = `
            <div class="col-5">
                <input type="text" name="specifications[keys][]" class="form-control" placeholder="Tên thông số">
            </div>
            <div class="col-5">
                <input type="text" name="specifications[values][]" class="form-control" placeholder="Giá trị">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger remove-spec"><i class="bi bi-trash"></i></button>
            </div>
        `;
        container.appendChild(row);
    });

    document.addEventListener('click', function(e) {
        if (e.target && (e.target.classList.contains('remove-spec') || e.target.closest('.remove-spec'))) {
            e.target.closest('.spec-row').remove();
        }
    });
</script>
@endsection
