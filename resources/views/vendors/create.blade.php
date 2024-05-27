@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Vendor</h1>
        <form action="{{ route('vendors.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create Vendor</button>
        </form>
    </div>
@endsection
