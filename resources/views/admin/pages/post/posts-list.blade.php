@extends('admin.layouts.app')
@section('title', 'Post Section')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Posts List</h5>
            <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">
                Create New Post
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Post Title </th>
                            <th>Date of Create</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postdata as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->created_at}}</td>
                                <td><span class="badge bg-info">{{ $data->status }}</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                         <form action="{{route('post.show', ['post' => $data->id])}}" method="GET">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                        </form>
                                        <form action="{{route('post.edit', ['post' => $data->id])}}" method="GET">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-secondary"><i
                                                    class="bi bi-pencil"></i></button>
                                        </form>
                                        <form action="{{route('post.destroy', ['post' => $data->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                   
                </table>
                 {{ $postdata->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection