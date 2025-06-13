@extends('admin.layouts.app')

@section('content')
    <!-- Recent Posts -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Posts</h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Create New
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Getting Started with Bootstrap 5</td>
                            <td><span class="badge bg-primary">Web Design</span></td>
                            <td><span class="badge bg-success">Published</span></td>
                            <td>May 15, 2023</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Advanced JavaScript Techniques</td>
                            <td><span class="badge bg-info">JavaScript</span></td>
                            <td><span class="badge bg-warning">Draft</span></td>
                            <td>May 10, 2023</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>CSS Grid Layout Tutorial</td>
                            <td><span class="badge bg-primary">Web Design</span></td>
                            <td><span class="badge bg-success">Published</span></td>
                            <td>May 5, 2023</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection