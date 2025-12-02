@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Contact Management</h2>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.contact.edit') }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit Contact Info
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
                @if($contactInfo)
                    <p><strong>Location:</strong><br>{{ $contactInfo->location ?? 'Not set' }}</p>
                    <p><strong>Office Address:</strong><br>{{ $contactInfo->office_address ?? 'Not set' }}</p>
                    <p><strong>Email:</strong><br>{{ $contactInfo->email ?? 'Not set' }}</p>
                    <p><strong>Phone Number:</strong><br>
                        @if($contactInfo->phone)
                            <a href="tel:{{ $contactInfo->phone }}" class="text-decoration-none">{{ $contactInfo->phone }}</a>
                            <br><small class="text-muted"><i class="bi bi-info-circle"></i> Used in "Call Now" button</small>
                        @else
                            <span class="text-danger">Not set</span>
                            <br><small class="text-muted">Please set a phone number for the "Call Now" button</small>
                        @endif
                    </p>
                    <span class="badge {{ $contactInfo->is_active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $contactInfo->is_active ? 'Active' : 'Inactive' }}
                    </span>
                @else
                    <p class="text-muted">No contact information set. <a href="{{ route('admin.contact.edit') }}">Add contact info</a></p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Contact Messages</h5>
                @if($unreadCount > 0)
                    <span class="badge bg-danger">{{ $unreadCount }} Unread</span>
                @endif
            </div>
            <div class="card-body">
                @if($messages->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                    <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                                        <td>
                                            @if($message->is_read)
                                                <span class="badge bg-success">Read</span>
                                            @else
                                                <span class="badge bg-warning">Unread</span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $message->name }}</strong></td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->subject, 40) }}</td>
                                        <td>{{ $message->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#messageModal{{ $message->id }}">
                                                    <i class="bi bi-eye"></i> View
                                                </button>
                                                @if(!$message->is_read)
                                                    <form action="{{ route('admin.contact.messages.read', $message->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="bi bi-check"></i> Mark Read
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.contact.messages.delete', $message->id) }}" method="POST" 
                                                      onsubmit="return confirm('Are you sure?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Modal for viewing message -->
                                    <div class="modal fade" id="messageModal{{ $message->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Message from {{ $message->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Email:</strong> {{ $message->email }}</p>
                                                    <p><strong>Subject:</strong> {{ $message->subject }}</p>
                                                    <p><strong>Date:</strong> {{ $message->created_at->format('F d, Y h:i A') }}</p>
                                                    <hr>
                                                    <p><strong>Message:</strong></p>
                                                    <p>{{ $message->message }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    @if(!$message->is_read)
                                                        <form action="{{ route('admin.contact.messages.read', $message->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Mark as Read</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $messages->links() }}
                    </div>
                @else
                    <p class="text-muted">No messages yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
