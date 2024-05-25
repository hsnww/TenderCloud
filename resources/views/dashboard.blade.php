
@extends('layouts.dashboard')
@section('content')
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold">لوحة التحكم</h1>
                    <p class="mt-2">مرحباً بك في لوحة التحكم</p>
{{--                     welcome user by his --}}
                    <p class="mt-2">أنت مسجل باستخدام حساب :  {{ Auth::user()->name }}</p>
{{--                    link for logout with logout form    --}}
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
@endsection
