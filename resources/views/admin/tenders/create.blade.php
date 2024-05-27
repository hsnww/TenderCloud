@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Create Tender</h1>
        <form action="{{ route('admin.tenders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="activity_id">Activity</label>
                <select name="activity_id" id="activity_id" class="form-control">
                    @foreach($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="project_type_id">Project Type</label>
                <select name="project_type_id" id="project_type_id" class="form-control">
                    @foreach($projectTypes as $projectType)
                        <option value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" name="release_date" id="release_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="submission_deadline">Submission Deadline</label>
                <input type="date" name="submission_deadline" id="submission_deadline" class="form-control">
            </div>

            <div class="form-group">
                <label for="opening_date">Opening Date</label>
                <input type="date" name="opening_date" id="opening_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="document_fee">Document Fee</label>
                <input type="number" step="0.01" name="document_fee" id="document_fee" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary m-3">Create Tender</button>
            <a href="{{ route('admin.tenders.index') }}" class="btn btn-warning m-3">Cancel</a>

        </form>
    </div>
@endsection
