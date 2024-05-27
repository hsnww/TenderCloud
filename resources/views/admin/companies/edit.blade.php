@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>
        <form action="{{ route('admin.companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
            </div>

            <div class="form-group">
                <label for="user_id">Assign User</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Select User</option>
                    @foreach($companyMembers as $member)
                        <option value="{{ $member->id }}" {{ $company->users->contains($member->id) ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-secondary m-3">Save Changes</button>
            <a href="{{ route('admin.companies.index') }}" class="btn btn-warning m-3">Cancel</a>

        </form>
    </div>
@endsection
