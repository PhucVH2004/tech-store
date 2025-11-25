@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1">
                        <label class="form-check-label" for="is_featured">
                            Featured Product
                        </label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Specifications</label>
                    <div id="specs-container">
                        <div class="row mb-2 spec-row">
                            <div class="col-5">
                                <input type="text" name="specifications[keys][]" class="form-control" placeholder="Key (e.g. Screen)">
                            </div>
                            <div class="col-5">
                                <input type="text" name="specifications[values][]" class="form-control" placeholder="Value (e.g. 6.1 inch)">
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-danger remove-spec"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-spec">Add Specification</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
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
                <input type="text" name="specifications[keys][]" class="form-control" placeholder="Key">
            </div>
            <div class="col-5">
                <input type="text" name="specifications[values][]" class="form-control" placeholder="Value">
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
