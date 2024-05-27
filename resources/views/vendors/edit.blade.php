@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Vendor</h1>
        @if($vendor)
            <form action="{{ route('vendors.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group m-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $vendor->name }}">
                </div>

                <div class="form-group m-3">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ $vendor->city }}">
                </div>

                <div class="form-group m-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $vendor->address }}">
                </div>

                <div class="form-group m-3">
                    <label for="industry">Industry</label>
                    <input type="text" name="industry" id="industry" class="form-control" value="{{ $vendor->industry }}">
                </div>

                <div class="form-group m-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $vendor->email }}">
                </div>

                <div class="form-group m-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $vendor->phone }}">
                </div>

                <div class="form-group m-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $vendor->mobile }}">
                </div>

                <div class="form-group m-3">
                    <label for="employees_count">Employees Count</label>
                    <input type="number" name="employees_count" id="employees_count" class="form-control" value="{{ $vendor->employees_count }}">
                </div>

                <div class="form-group m-3">
                    <label for="established_at">Established At</label>
                    <input type="date" name="established_at" id="established_at" class="form-control" value="{{ $vendor->established_at }}">
                </div>

                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="{{ route('vendors.index') }}" type="submit" class="btn btn-warning m-3">Cancel</a>

            </form>
        @else
            <p>No vendor information available.</p>
        @endif
    </div>
@endsection
