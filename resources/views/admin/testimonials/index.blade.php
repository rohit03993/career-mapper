@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Testimonials</h2>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add New Testimonial
    </a>
</div>

@if($testimonials->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Testimonial Preview</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <td>
                                    @if($testimonial->image)
                                        @php
                                            $imageUrl = (strpos($testimonial->image, 'http') === 0) ? $testimonial->image : asset('storage/' . $testimonial->image);
                                        @endphp
                                        <img src="{{ $imageUrl }}" alt="{{ $testimonial->name }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;"
                                             onerror="this.src='https://via.placeholder.com/60x60/cccccc/666666?text=No+Image'; this.onerror=null;">
                                    @else
                                        <div style="width: 60px; height: 60px; border-radius: 50%; background: #ddd; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person" style="font-size: 24px; color: #999;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $testimonial->name }}</strong></td>
                                <td>{{ $testimonial->designation }}</td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($testimonial->testimonial, 100) }}</small>
                                </td>
                                <td>{{ $testimonial->order }}</td>
                                <td>
                                    <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this testimonial?');" class="d-inline">
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
        <p>No testimonials found. <a href="{{ route('admin.testimonials.create') }}">Add your first testimonial</a></p>
    </div>
@endif
@endsection
