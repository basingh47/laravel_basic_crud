
@extends('admin.layouts.app')
{{-- @dd($categories); --}}
@section('content')
    <!-- Create Post Form (place inside your modal body) -->
    <form action="{{ route('post.update',['post'=>$post->id]) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Post Title -->
    <div class="mb-3">
        <label for="postTitle" class="form-label">Post Title *</label>
        <input type="text" name="postTitle"
            class="form-control form-control-lg @error('postTitle') is-invalid @enderror"
            id="postTitle"
            placeholder="Enter post title"
            value="{{ old('postTitle') ?? $post->title }}"
            required>
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
            <select name="postCategory"
                class="form-select @error('postCategory') is-invalid @enderror"
                id="postCategory" required>
                <option value="" disabled {{ old('postCategory') ? '' : 'selected' }}>Select category</option>
                @foreach ($categories as $id => $categoryName)
                    <option value="{{ $id }}" {{ old('postCategory') ?? $post->category_id == $id ? 'selected' : '' }}>
                        {{ $categoryName }}
                    </option>
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
            <input name="postTags"
                class="form-control @error('postTags') is-invalid @enderror"
                id="postTags"
                placeholder="Add tags (comma separated)"
                value="{{ old('postTags') }}">
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
            <input name="featuredImage" type="file"
                class=" @error('featuredImage') is-invalid @enderror"
                id="featuredImage"
                accept="image/*">
            {{-- <img src="placeholder-image.jpg" id="imagePreview" class="img-fluid mb-2"
                style="max-height: 200px; display: none;">
            <button type="button" class="btn btn-outline-primary"
                onclick="document.getElementById('featuredImage').click()">
                <i class="bi bi-upload"></i> Upload Image
            </button> --}}
            <div class="form-text">Recommended size: 1200x630 pixels</div>
        </div>
        @error('featuredImage')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Post Content -->
    <div class="mb-3">
        <label for="postContent" class="form-label">Content *</label>
        <textarea name="postContent"
            class="form-control @error('postContent') is-invalid @enderror"
            id="postContent"
            rows="8"
            required>{{ old('postContent') ?? $post->post_content }}</textarea>
        @error('postContent')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Status & Publish Options -->
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label for="postStatus" class="form-label">Status *</label>
            <select name="postStatus"
                class="form-select @error('postStatus') is-invalid @enderror"
                id="postStatus" required>
                <option value="" disabled {{ old('postStatus') ? '':'selected'  }}>Select Status</option>
                <option value="Draft" {{ old('postStatus') ?? $post->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Publish" {{ old('postStatus') ?? $post->status == 'publish' ? 'selected' : '' }} >Published</option>
                <option value="Scheduled" {{ old('postStatus') ?? $post->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
            </select>
            @error('postStatus')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
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