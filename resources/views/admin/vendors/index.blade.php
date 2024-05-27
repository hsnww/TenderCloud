@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Vendors</h1>
        <a href="{{ route('admin.vendors.create') }}" class="btn btn-primary mb-3">Create Vendor</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Industry</th>
                <th>Employees</th>
                <th>Manager</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->city }}</td>
                    <td>{{ $vendor->industry }}</td>
                    <td>{{ $vendor->employees_count }}</td>
                    <td>
                        @foreach($vendor->users as $user)
                            <p class="text-red-600">{{ $user->name }}</p>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $vendors->links() }}
    </div>
@endsection
