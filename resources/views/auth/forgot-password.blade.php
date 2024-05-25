@extends('layouts.auth')

@section('content')
    <div class="auth-title">
        <h2>نسيت كلمة المرور</h2>
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('نسيت كلمة المرور؟ لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل لك رابط إعادة تعيين كلمة المرور الذي سيمكنك من اختيار واحدة جديدة.') }}
    </div>

    @if (session('status'))
        <div class="auth-status">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
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
{{--            <i class="fas fa-envelope icon"></i>--}}
            <input type="email" id="email" name="email" class="auth-input" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required autofocus>
        </div>

        <button type="submit" class="auth-button">إرسال رابط إعادة تعيين كلمة المرور</button>

        <div class="links">
            <a href="{{ route('login') }}" class="auth-link">العودة لتسجيل الدخول</a>
        </div>
    </form>
@endsection
