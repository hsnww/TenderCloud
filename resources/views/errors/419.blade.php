<!-- resources/views/errors/419.blade.php -->

@extends('layouts.app')

@section('title', 'الصفحة منتهية الصلاحية')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-1">419</h1>
        <h2>عذراً، الصفحة منتهية الصلاحية</h2>
        <p>لقد انتهت صلاحية الصفحة. يرجى إعادة تحميل الصفحة والمحاولة مرة أخرى.</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary">إعادة تحميل الصفحة</a>
    </div>
@endsection
