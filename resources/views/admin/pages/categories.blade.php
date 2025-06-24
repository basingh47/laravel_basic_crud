@extends('admin.layouts.app')


@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Categories List</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                Create New categories
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Categories Name</th>
                            <th>Date of Create</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($categoryData); --}}
                        @foreach ($categoryData as $item)
                            <tr>
                                <td>{{$item->category_name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <form action="{{route('categories.edit', ['category' => $item->category_id])}}" method="GET">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                    </form>
                                    <form action="{{route('categories.destroy', ['category' => $item->category_id])}}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection