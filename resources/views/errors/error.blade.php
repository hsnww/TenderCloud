<!-- resources/views/errors/error.blade.php -->

@extends('layouts.app')

@section('title', 'حدث خطأ')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-1">خطأ</h1>
        <h2>عذراً، حدث خطأ ما</h2>
        <p>يرجى المحاولة لاحقاً.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
    </div>
@endsection
