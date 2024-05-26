@extends('layouts.auth')

@section('content')
    <div class="auth-title">
        <h2>تسجيل عضو جديد</h2>
    </div>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="input-with-icon">
{{--            <i class="fas fa-user icon"></i>--}}
            <input type="text" id="name" name="name" class="auth-input" value="{{ old('name') }}" placeholder="الاسم الكامل" required autofocus>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-envelope icon"></i>--}}
            <input type="email" id="email" name="email" class="auth-input" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-envelope icon"></i>--}}
            <input type="text" id="mobile" name="mobile" class="auth-input" value="{{ old('mobile') }}" placeholder="رقم الجوال" required>
            <small>ابدأ بالرمز الدولي 966</small>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-lock icon"></i>--}}
            <input type="password" id="password" name="password" class="auth-input" placeholder="كلمة المرور" required>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-lock icon"></i>--}}
            <input type="password" id="password_confirmation" name="password_confirmation" class="auth-input" placeholder="تأكيد كلمة المرور" required>
        </div>

        <button type="submit" class="auth-button">تسجيل</button>

        <div class="links">
            <a href="{{ route('login') }}" class="auth-link">هل لديك حساب بالفعل؟</a>
        </div>
    </form>
@endsection
