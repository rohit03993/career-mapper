@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Portfolio Categories</h2>
    <a href="{{ route('admin.portfolio.categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add New Category
    </a>
</div>

@if($categories->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Items Count</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->order }}</td>
                                <td><strong>{{ $category->name }}</strong></td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td>
                                    <span class="badge bg-info">{{ $category->portfolio_items_count }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.portfolio.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.portfolio.categories.destroy', $category->id) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this category?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No categories found. <a href="{{ route('admin.portfolio.categories.create') }}">Create your first category</a></p>
    </div>
@endif

<div class="mt-3">
    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Portfolio
    </a>
</div>
@endsection
