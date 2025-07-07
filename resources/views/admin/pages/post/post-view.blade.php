@extends('admin.layouts.app')
@section('title', 'Post Section')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Post View</h5>

        </div>
        <div class="card-body">
            <h4>{{ $post->title }}</h4>

            <p class="text-muted">
                Category: <strong>{{ $post->category->category_name ?? 'Uncategorized' }}</strong> |
                Status: <span class="badge bg-info">{{ $post->status }}</span> |
                Created: {{ $post->created_at->format('d M Y, h:i A') }}
            </p>

            @if ($post->image_path)
                <div class="mb-3">
                    <img src="{{ asset($post->image_path) }}" class="img-fluid rounded" style="max-height: 300px;">
                </div>
            @endif

            <div>
                <h6>Content:</h6>
                <div class="border rounded p-3 bg-light">
                    {!! nl2br(e($post->post_content)) !!}
                </div>
            </div>
        </div>
    </div>


@endsection