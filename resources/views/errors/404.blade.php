<!-- resources/views/errors/404.blade.php -->

@extends('layouts.app')

@section('title', 'الصفحة غير موجودة')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-1">404</h1>
        <h2>عذراً، الصفحة غير موجودة</h2>
        <p>الصفحة التي تحاول الوصول إليها غير موجودة أو قد تم نقلها.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
    </div>
@endsection
