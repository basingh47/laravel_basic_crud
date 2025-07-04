@extends('admin.layouts.app')
{{-- @dd($categories); --}}
@section('content')
    <!-- Create Post Form (place inside your modal body) -->
    <form action="{{ route('post.store') }}" method="POST" class="needs-validation" novalidate>
        <!-- Post Title -->
        @csrf
        <div class="mb-3">
            <label for="postTitle" class="form-label">Post Title *</label>
            <input type="text" name="postTitle" class="form-control form-control-lg" id="postTitle"
                placeholder="Enter post title" required>
            @error('postTitle')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <!-- Category & Tags -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="postCategory" class="form-label">Category *</label>
                <select name="postCategory" class="form-select" id="postCategory" required>
                    <option value="" selected disabled>Select category</option>
                    @foreach ($categories as $id => $categoryName)
                        <option value="{{ $id }}">{{ $categoryName }}</option>
                    @endforeach
                </select>
                @error('postCategory')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="postTags" class="form-label">Tags</label>
                <input name="postTags" class="form-control" id="postTags" placeholder="Add tags (comma separated)">
                @error('postTags')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Featured Image -->
        <div class="mb-3">
            <label for="featuredImage" class="form-label">Featured Image</label>
            <div class="image-upload-container border rounded p-3 text-center">
                <input name="featuredImage" type="file" class="d-none" id="featuredImage" accept="image/*">
                <img src="placeholder-image.jpg" id="imagePreview" class="img-fluid mb-2"
                    style="max-height: 200px; display: none;">
                <button type="button" class="btn btn-outline-primary"
                    onclick="document.getElementById('featuredImage').click()">
                    <i class="bi bi-upload"></i> Upload Image
                </button>
                <div class="form-text">Recommended size: 1200x630 pixels</div>
            </div>
            @error('featuredImage')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Post Content -->
        <div class="mb-3">
            <label for="postContent" class="form-label">Content *</label>
            <textarea name="postContent" class="form-control" id="postContent" rows="8" required></textarea>
            @error('featuredImage')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <!-- Status & Publish Options -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="postStatus" class="form-label">Status *</label>
                <select name="postStatus" class="form-select" id="postStatus" required>
                    <option value="draft">Draft</option>
                    <option value="published" selected>Published</option>
                    <option value="scheduled">Scheduled</option>
                </select>
                @error('postStatus')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6" id="scheduleDateContainer" style="display: none;">
                <label for="publishDate" class="form-label">Publish Date</label>
                <input type="datetime-local" class="form-control" id="publishDate">
            </div>
        </div>

        <!-- Form Actions -->
        <div class="d-flex justify-content-between pt-3 border-top">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-lg"></i> Cancel
            </button>
            <div>
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-save"></i> Save Draft
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-send-check"></i> Publish
                </button>
            </div>
        </div>
    </form>
@endsection