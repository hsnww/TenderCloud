@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="form-group m-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group m-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group m-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group m-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <div class="form-group m-3">
                <label for="role">Role</label><br>
                <input type="radio" name="role" value="" onclick="toggleAssociationType()"> No role<br>
                @foreach($roles as $role)
                    <input type="radio" name="role" value="{{ $role->name }}" onclick="toggleAssociationType()"> {{ ucfirst($role->name) }}<br>
                @endforeach
            </div>

            <div class="form-group m-3" id="association-type" style="display: none;">
                <label>Association Type</label><br>
                <input type="radio" name="association_type" value="company" onclick="selectRoleAndAssociation('company')"> Company<br>
                <input type="radio" name="association_type" value="vendor" onclick="selectRoleAndAssociation('vendor')"> Vendor<br>
            </div>

            <div class="form-group m-3" id="company-select" style="display: none;">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group m-3" id="vendor-select" style="display: none;">
                <label for="vendor_id">Vendor</label>
                <select name="vendor_id" id="vendor_id" class="form-control">
                    <option value="">Select Vendor</option>
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success m-3">Create User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-warning m-3">Cancel</a>
        </form>
    </div>

    <script>
        function toggleAssociation(type) {
            if (type === 'company') {
                document.getElementById('company-select').style.display = 'block';
                document.getElementById('vendor-select').style.display = 'none';
            } else if (type === 'vendor') {
                document.getElementById('company-select').style.display = 'none';
                document.getElementById('vendor-select').style.display = 'block';
            }
        }

        function toggleAssociationType() {
            const selectedRole = document.querySelector('input[name="role"]:checked').value;
            const associationTypeDiv = document.getElementById('association-type');
            const companySelectDiv = document.getElementById('company-select');
            const vendorSelectDiv = document.getElementById('vendor-select');

            if (selectedRole === 'administrator' || selectedRole === 'moderator' || selectedRole === '') {
                associationTypeDiv.style.display = 'none';
                companySelectDiv.style.display = 'none';
                vendorSelectDiv.style.display = 'none';
                document.querySelectorAll('input[name="association_type"]').forEach(radio => radio.checked = false);
            } else if (selectedRole === 'company_member') {
                associationTypeDiv.style.display = 'block';
                document.querySelector('input[name="association_type"][value="company"]').checked = true;
                toggleAssociation('company');
            } else if (selectedRole === 'vendor_member') {
                associationTypeDiv.style.display = 'block';
                document.querySelector('input[name="association_type"][value="vendor"]').checked = true;
                toggleAssociation('vendor');
            }
        }

        function selectRoleAndAssociation(type) {
            if (type === 'company') {
                document.querySelector('input[name="role"][value="company_member"]').checked = true;
                toggleAssociation('company');
            } else if (type === 'vendor') {
                document.querySelector('input[name="role"][value="vendor_member"]').checked = true;
                toggleAssociation('vendor');
            }
        }

        // Initialize the display
        document.addEventListener('DOMContentLoaded', function() {
            toggleAssociationType();
        });
    </script>
@endsection
