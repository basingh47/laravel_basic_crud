{{-- @dd($category); --}}
@extends('admin.layouts.app')

@section('content')
 @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <!-- Create Post Form (place inside your modal body) -->
    <form method="POST" action="{{ route('categories.update',['category'=>$category->id]) }}">
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
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-lg"></i> Cancel
            </button>
            <div>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-send-check"></i> Update
                </button>
            </div>
        </div>
    </form>
@endsection