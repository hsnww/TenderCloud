@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-start m-3">إدارة حساب مزودي الخدمات</h2>
            <p class="text-start m-3">منطقة مدير حساب مزودي الخدمات .. يجب أن تملك صلاحيات Vendors members</p>
        </div>
        <div class="col-12">
            <hr class="text-danger mx-auto" style="width: 75%">
        </div>
        <div class="col-12">

        <h1>بيانات مزود الخدمة</h1>
        @if($vendor)
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td>{{ $vendor->name }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $vendor->city }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $vendor->address }}</td>
                </tr>
                <tr>
                    <th>Industry</th>
                    <td>{{ $vendor->industry }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $vendor->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $vendor->phone }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $vendor->mobile }}</td>
                </tr>
                <tr>
                    <th>Employees Count</th>
                    <td>{{ $vendor->employees_count }}</td>
                </tr>
                <tr>
                    <th>Established At</th>
                    <td>{{ $vendor->established_at }}</td>
                </tr>
            </table>

            <a href="{{ route('vendors.edit') }}" class="btn btn-primary col-3">Edit Vendor</a>
        @else
            <p>No vendor information available.</p>
        @endif
        </div>
    </div>
@endsection
