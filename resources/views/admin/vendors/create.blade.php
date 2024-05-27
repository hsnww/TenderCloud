@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Create Vendor</h1>
        <form action="{{ route('admin.vendors.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="industry">Industry</label>
                <input type="text" name="industry" id="industry" class="form-control" required>

            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="employees_count">Employees Count</label>
                <input type="number" name="employees_count" id="employees_count" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="established_at">Established At</label>
                <input type="date" name="established_at" id="established_at" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success m-3">Create Vendor</button>
            <a href="{{ route('admin.vendors.index') }}" class="btn btn-warning m-3">Cancel</a>

        </form>
    </div>
@endsection
