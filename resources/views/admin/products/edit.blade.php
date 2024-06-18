@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="card">
    <div class="card-header">Edit Product</div>
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ number_format($product->price, 2, ',', '.') }}" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
