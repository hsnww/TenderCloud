@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>إدارة المناقصات</h1>
        <a href="{{ route('admin.tenders.create') }}" class="btn btn-primary mb-3">Create Tender</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Release Date</th>
                <th>Submission Deadline</th>
                <th>Opening Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tenders as $tender)
                <tr>
                    <td>{{ $tender->name }}</td>
                    <td>{{ $tender->company->name }}</td>
                    <td>{{ $tender->release_date }}</td>
                    <td>{{ $tender->submission_deadline }}</td>
                    <td>{{ $tender->opening_date }}</td>
                    <td>
                        <a href="{{ route('admin.tenders.edit', $tender->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.tenders.destroy', $tender->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tenders->links() }}
    </div>
@endsection
