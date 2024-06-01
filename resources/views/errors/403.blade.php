<!-- resources/views/errors/403.blade.php -->

@extends('layouts.app')

@section('title', 'ممنوع الوصول')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-1">403</h1>
        <h2>عذراً، ليس لديك الصلاحية للوصول إلى هذه الصفحة</h2>
        <p>ليس لديك إذن للوصول إلى هذه الصفحة.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
    </div>
@endsection
