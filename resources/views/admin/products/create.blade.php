@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<div class="card">
    <div class="card-header">Create Product</div>
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('price').addEventListener('input', function (e) {
        let value = this.value.replace(/\D/g, '');

        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        this.value = value;
    });

    document.getElementById('price').closest('form').addEventListener('submit', function () {
        let priceInput = document.getElementById('price');
        let priceValue = priceInput.value;

        priceValue = priceValue.replace(/\./g, '');

        priceInput.value = priceValue;
    });
</script>
@endsection
