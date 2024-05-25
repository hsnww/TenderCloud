@extends('layouts.auth')

@section('content')
    <div class="auth-title">
        <h2>تسجيل الدخول</h2>
    </div>
    <form action="{{ route('login') }}" method="POST">
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
            <input type="text" id="email" name="email" class="auth-input" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required autofocus>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-lock icon"></i>--}}
            <input type="password" id="password" name="password" class="auth-input" placeholder="كلمة المرور" required>
        </div>

        <div class="remember-me">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">تذكرني</label>
        </div>

        <button type="submit" class="auth-button mt-2">تسجيل الدخول</button>

        <div class="links">
            <a href="{{ route('password.request') }}" class="auth-link">هل نسيت كلمة المرور؟</a>
        </div>
        <div class="links">
            <a href="{{ route('register') }}" class="auth-link">ليس لديك حساب ؟ سجل الان</a>
        </div>
    </form>
@endsection
