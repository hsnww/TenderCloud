@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Company Details</h1>
        @if($company)
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td>{{ $company->name }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $company->city }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $company->address }}</td>
                </tr>
                <tr>
                    <th>Industry</th>
                    <td>{{ $company->industry }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $company->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $company->phone }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $company->mobile }}</td>
                </tr>
                <tr>
                    <th>Employees Count</th>
                    <td>{{ $company->employees_count }}</td>
                </tr>
                <tr>
                    <th>Established At</th>
                    <td>{{ $company->established_at }}</td>
                </tr>
            </table>
            <a href="{{ route('companies.edit') }}" class="btn btn-primary">Edit Company</a>
        @else
            <p>No company information available.</p>
        @endif
    </div>
@endsection
