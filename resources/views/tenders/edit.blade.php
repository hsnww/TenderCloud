@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Tender</h1>
        <form action="{{ route('tenders.update', $tender->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tender->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $tender->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" name="release_date" id="release_date" class="form-control" value="{{ $tender->release_date }}" required>
            </div>

            <div class="form-group">
                <label for="submission_deadline">Submission Deadline</label>
                <input type="date" name="submission_deadline" id="submission_deadline" class="form-control" value="{{ $tender->submission_deadline }}" required>
            </div>

            <div class="form-group">
                <label for="opening_date">Opening Date</label>
                <input type="date" name="opening_date" id="opening_date" class="form-control" value="{{ $tender->opening_date }}" required>
            </div>

            <div class="form-group">
                <label for="document_fee">Document Fee</label>
                <input type="number" name="document_fee" id="document_fee" class="form-control" value="{{ $tender->document_fee }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active" {{ $tender->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="disabled" {{ $tender->status == 'disabled' ? 'selected' : '' }}>Disabled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success m-3">Save Changes</button>
            <a href="{{ route('tenders.index') }}" type="submit" class="btn btn-warning m-3">Cancel</a>

        </form>
    </div>
@endsection
