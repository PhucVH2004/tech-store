@extends('admin.layouts.app')

@section('title', 'Sửa Danh Mục')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Cập Nhật Danh Mục</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-medium">Tên Danh Mục</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required placeholder="Nhập tên danh mục">
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium">Hình Ảnh</label>
                <input type="file" name="image" class="form-control">
                @if($category->image)
                    <div class="mt-2">
                        <img src="{{ \App\Helpers\ImageHelper::display($category->image) }}" alt="Current Image" class="rounded border" width="100">
                    </div>
                @endif
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-pill">Cập Nhật</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-light px-4 rounded-pill ms-2">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection
