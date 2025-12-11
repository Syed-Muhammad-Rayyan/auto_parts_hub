@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Contact Message #{{ $contact->id }}</h2>
            <a href="{{ route('admin.contacts.index', ['status' => $currentStatus]) }}" class="btn btn-secondary">Back to Messages</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <h4>Sender Information</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <th>Subject:</th>
                        <td>{{ $contact->subject }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4>Message Details</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Status:</th>
                        <td>
                            <span class="badge bg-{{ $contact->status === 'replied' ? 'success' : 'warning' }}">
                                {{ ucfirst($contact->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Received:</th>
                        <td>{{ $contact->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                    @if($contact->replied_at)
                        <tr>
                            <th>Replied:</th>
                            <td>{{ $contact->replied_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="mt-4">
            <h4>Message:</h4>
            <div class="p-3 bg-light border rounded">
                {{ $contact->message }}
            </div>
        </div>

        @if($contact->reply_message)
            <div class="mt-4">
                <h4>Reply:</h4>
                <div class="p-3 bg-light border rounded">
                    {{ $contact->reply_message }}
                </div>
            </div>
        @endif

        <div class="mt-4">
            <h4>Update Status / Add Reply</h4>
            <form action="{{ route('admin.contacts.update', ['contact' => $contact->id, 'status' => $currentStatus]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Status:</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $contact->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Reply Message (optional):</label>
                    <textarea name="reply_message" class="form-control" rows="4">{{ $contact->reply_message }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection



