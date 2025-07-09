@extends('admin.layouts.app')
@section('title', 'Category Section')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Categories Update</h5>

        </div>
        <div class="card-body">
            <!-- Update Post Form (place inside your modal body) -->
            <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
                @csrf
                @method('PUT')
                <!-- Post Title -->
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name *</label>
                    <input type="text" name="categoryName" value="{{ old('categoryName', $category->category_name)}}"
                        class="form-control form-control-lg @error('categoryName') is-invalid @enderror" id="categoryName"
                        placeholder="Enter post category name" required>
                    <div class="invalid-feedback">
                        @error('categoryName')
                            {{ $message }}
                        @enderror
                    </div>

                </div>

                <!-- Form Actions -->
                <div class="d-flex justify-content-between pt-3 border-top">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg"></i> Cancel
                    </a>
                    <div>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-send-check"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection