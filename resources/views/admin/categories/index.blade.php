@extends('admin.layouts.app')

@section('title', 'Danh Mục')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Danh Sách Danh Mục</h5>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
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
                        <th>Tên Danh Mục</th>
                        <th>Slug</th>
                        <th class="text-end pe-4">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="ps-4 text-muted">#{{ $category->id }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ \App\Helpers\ImageHelper::display($category->image) }}" alt="{{ $category->name }}" class="rounded" width="40" height="40" style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-medium">{{ $category->name }}</td>
                        <td class="text-muted">{{ $category->slug }}</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-light btn-sm text-primary me-1" data-bs-toggle="tooltip" title="Sửa">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-sm text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')" data-bs-toggle="tooltip" title="Xóa">
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
        {{ $categories->links() }}
    </div>
</div>
@endsection
