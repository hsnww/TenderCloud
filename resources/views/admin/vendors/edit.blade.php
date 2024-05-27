@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Vendor</h1>
        <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Vendor Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $vendor->name }}">
            </div>

            <div class="form-group">
                <label for="user_id">Assign User</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Select User</option>
                    @foreach($vendorMembers as $member)
                        <option value="{{ $member->id }}" {{ $vendor->users->contains($member->id) ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success m-3">Save Changes</button>
            <a href="{{ route('admin.vendors.index') }}" class="btn btn-warning m-3">Cancel</a>

        </form>
    </div>
@endsection
