@extends('admin.layouts.app')

@section('title', 'Sản Phẩm')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Danh Sách Sản Phẩm</h5>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Thêm Mới
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Giá</th>
                        <th>Kho</th>
                        <th class="text-end pe-4">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="ps-4 text-muted">#{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ \App\Helpers\ImageHelper::display($product->image) }}" alt="{{ $product->name }}" class="rounded" width="40" height="40" style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-medium">{{ $product->name }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $product->category->name }}</span></td>
                        <td class="fw-bold text-primary">{{ number_format($product->price) }} đ</td>
                        <td>
                            @if($product->stock > 0)
                                <span class="badge bg-success bg-opacity-10 text-success">{{ $product->stock }}</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger">Hết hàng</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-light btn-sm text-primary me-1" data-bs-toggle="tooltip" title="Sửa">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-sm text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" data-bs-toggle="tooltip" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white py-3">
        {{ $products->links() }}
    </div>
</div>
@endsection
