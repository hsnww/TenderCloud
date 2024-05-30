@extends('layouts.dashboard')

@section('content')
    <h4>معلومات العرض</h4>
    <p>تاريخ التقديم: {{ $bidRequest->created_at->format('Y-m-d') }}</p>
    <p>المبلغ: {{ $bidRequest->amount }}</p>

    <h4>معلومات مزود الخدمة</h4>
    <p>اسم المزود: {{ $vendor->name }}</p>
    <p>البريد الإلكتروني: {{ $vendor->email }}</p>
    <p>الهاتف: {{ $vendor->phone }}</p>
    <!-- يمكنك إضافة المزيد من المعلومات هنا -->
@endsection
