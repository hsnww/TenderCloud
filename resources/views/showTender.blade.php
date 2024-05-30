@extends('layouts.app')

@section('content')
             <h1>تفاصيل المناقصة</h1>
             <table class="table">
                <tr>
                    <th>Name</th>
                    <td>{{ $tender->name }}</td>
                </tr>
                 <tr>
                     <th>Activity</th>
                     <td>{{ $tender->activity->name }}</td>
                 </tr>
                 <tr>
                     <th>Project Type</th>
                     <td>{{ $tender->projectType->name }}</td>
                 </tr>
                 <tr>
                 <th>Description</th>
                 <td>{{ $tender->description }}</td>
                 </tr>
                 <tr>
                 <th>Release Date</th>
                 <td>{{ $tender->release_date }}</td>
                 </tr>
                 <tr>
                 <th>Submission Deadline</th>
                 <td>{{ $tender->submission_deadline }}</td>
                 </tr>
                 <tr>
                 <th>Opening Date</th>
                 <td>{{ $tender->opening_date }}</td>
                 </tr>
                 <tr>
                 <th>Document Fee</th>
                 <td>{{ $tender->document_fee }}</td>
                 </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $tender->status }}</td>
                </tr>
            </table>
            <a href="{{ route('tenders') }}" class="btn btn-primary">الرجوع إلى قائمة المناقصات</a>
                    @php
                        $vendorIds = auth()->user()->vendors->pluck('id')->toArray();
                        $hasBidRequest = $tender->bidRequests()->whereIn('vendor_id', $vendorIds)->exists();
                    @endphp
                    @if ($hasBidRequest)
                        <button class="btn btn-success" disabled>تم الشراء</button>
                    @else
                        <a href="{{ route('vendors.bid_requests.create', $tender->id) }}" class="btn btn-warning">طلب الدخول إلى المناقصة</a>

                    @endif

@endsection
