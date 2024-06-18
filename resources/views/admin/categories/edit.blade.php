@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="card">
    <div class="card-header">Edit Category</div>
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" class="form-control-file" id="img_url" name="img_url">
                @if($category->img_url)
                <img src="{{ asset('storage/' . $category->img_url) }}" alt="{{ $category->name }}" width="100" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
