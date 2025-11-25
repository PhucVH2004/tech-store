@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="url" name="image" class="form-control" value="{{ $category->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
