@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>المناقصات</h1>
        <p>المناقصات التي تم تقديمها من قبل {{ $company->name }} "<a href="{{ route('tenders.disabled') }}">شاهد المناقصات التي تم تعطيلها</a>"</p>
        <a href="{{ route('tenders.create') }}" class="btn btn-primary mb-3">Create Tender</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Release Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tenders as $tender)
                <tr>
                    <td>{{ $tender->name }}</td>
                    <td>{{ $tender->release_date }}</td>
                    <td>{{ $tender->status }}</td>
                    <td>
                        <a href="{{ route('tenders.edit', $tender->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('tenders.requestDelete', $tender->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Request Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
