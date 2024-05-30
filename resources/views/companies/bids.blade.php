@extends('layouts.dashboard')
@section('content')
    <h2>قائمة العروض المقدمة</h2>
    <ul class="list-group">
        @foreach ($bids as $bid)
            <li class="list-group-item m-2">
                عرض مقدم من <a href="@">{{ $bid->vendor->name }}</a> إلى مناقصة "{{ $bid->tender->name }}"
                <p>تاريخ فتح المظاريف: {{ $bid->tender->opening_date }}</p>
                <p>تاريخ التقديم: {{ $bid->created_at->format('Y-m-d') }}</p>
                <a href="{{ route('companies.tenders.bid.details', ['tender' => $bid->tender->id, 'bidRequest' => $bid->id]) }}">
                    عرض التفاصيل
                </a>
            </li>
        @endforeach
    </ul>
@endsection
