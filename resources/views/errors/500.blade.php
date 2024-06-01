<!-- resources/views/errors/500.blade.php -->

@extends('layouts.app')

@section('title', 'خطأ في الخادم الداخلي')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-1">500</h1>
        <h2>عذراً، حدث خطأ في الخادم</h2>
        <p>نواجه بعض المشاكل في الخادم. يرجى المحاولة لاحقاً.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
    </div>
@endsection
