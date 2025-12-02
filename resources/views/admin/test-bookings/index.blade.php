@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Test Bookings</h2>
    @php
        $unreadCount = $bookings->where('is_read', false)->count();
    @endphp
    @if($unreadCount > 0)
        <span class="badge bg-danger fs-6">{{ $unreadCount }} Unread</span>
    @endif
</div>

@if($bookings->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Test</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr class="{{ !$booking->is_read ? 'table-warning' : '' }}">
                                <td>
                                    @if($booking->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-warning">Unread</span>
                                    @endif
                                </td>
                                <td><strong>{{ $booking->name }}</strong></td>
                                <td>{{ $booking->contact_number }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>
                                    @if($booking->testPage)
                                        <span class="badge bg-info">{{ $booking->testPage->title }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>{{ $booking->created_at->format('M d, Y h:i A') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('admin.test-bookings.show', $booking->id) }}" class="btn btn-info">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.test-bookings.destroy', $booking->id) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this booking?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
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
            <div class="mt-3">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No test bookings found yet.</p>
    </div>
@endif
@endsection

