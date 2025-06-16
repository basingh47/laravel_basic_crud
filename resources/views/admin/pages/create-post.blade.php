@extends('admin.layouts.app')

@section('content')
    <!-- Create Post Form (place inside your modal body) -->
    <form class="needs-validation" novalidate>
        <!-- Post Title -->
        <div class="mb-3">
            <label for="postTitle" class="form-label">Post Title *</label>
            <input type="text" class="form-control form-control-lg" id="postTitle" placeholder="Enter post title" required>
            <div class="invalid-feedback">
                Please provide a post title.
            </div>
        </div>

        <!-- Slug (auto-generated from title) -->
        {{-- <div class="mb-3">
            <label for="postSlug" class="form-label">URL Slug</label>
            <div class="input-group">
                <span class="input-group-text">/blog/</span>
                <input type="text" class="form-control" id="postSlug" placeholder="post-url-slug" readonly>
                <button class="btn btn-outline-secondary" type="button" id="editSlug">
                    <i class="bi bi-pencil"></i> Edit
                </button>
            </div>
        </div> --}}

        <!-- Category & Tags -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="postCategory" class="form-label">Category *</label>
                <select class="form-select" id="postCategory" required>
                    <option value="" selected disabled>Select category</option>
                    <option value="technology">Technology</option>
                    <option value="design">Design</option>
                    <option value="business">Business</option>
                </select>
                <div class="invalid-feedback">
                    Please select a category.
                </div>
            </div>
            <div class="col-md-6">
                <label for="postTags" class="form-label">Tags</label>
                <input class="form-control" id="postTags" placeholder="Add tags (comma separated)">
            </div>
        </div>

        <!-- Featured Image -->
        <div class="mb-3">
            <label for="featuredImage" class="form-label">Featured Image</label>
            <div class="image-upload-container border rounded p-3 text-center">
                <input type="file" class="d-none" id="featuredImage" accept="image/*">
                <img src="placeholder-image.jpg" id="imagePreview" class="img-fluid mb-2"
                    style="max-height: 200px; display: none;">
                <button type="button" class="btn btn-outline-primary"
                    onclick="document.getElementById('featuredImage').click()">
                    <i class="bi bi-upload"></i> Upload Image
                </button>
                <div class="form-text">Recommended size: 1200x630 pixels</div>
            </div>
        </div>

        <!-- Post Content -->
        <div class="mb-3">
            <label for="postContent" class="form-label">Content *</label>
            <textarea class="form-control" id="postContent" rows="8" required></textarea>
            <div class="invalid-feedback">
                Please provide post content.
            </div>
        </div>

        <!-- SEO Fields -->
        {{-- <div class="accordion mb-3" id="seoAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#seoFields">
                        <i class="bi bi-search me-2"></i> SEO Settings
                    </button>
                </h2>
                <div id="seoFields" class="accordion-collapse collapse" data-bs-parent="#seoAccordion">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <label for="metaTitle" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="metaTitle" placeholder="Title for search engines">
                        </div>
                        <div class="mb-3">
                            <label for="metaDescription" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="metaDescription" rows="3"
                                placeholder="Description for search engines"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Status & Publish Options -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="postStatus" class="form-label">Status *</label>
                <select class="form-select" id="postStatus" required>
                    <option value="draft">Draft</option>
                    <option value="published" selected>Published</option>
                    <option value="scheduled">Scheduled</option>
                </select>
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