@extends('layouts.auth')

@section('content')
    <div class="auth-title">
        <h2>إعادة تعيين كلمة المرور</h2>
    </div>

    <form action="{{ route('password.store') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
            <input type="email" id="email" name="email" class="auth-input" value="{{ old('email', $request->email) }}" placeholder="البريد الإلكتروني" required autofocus>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-lock icon"></i>--}}
            <input type="password" id="password" name="password" class="auth-input" placeholder="كلمة المرور" required>
        </div>

        <div class="input-with-icon">
{{--            <i class="fas fa-lock icon"></i>--}}
            <input type="password" id="password_confirmation" name="password_confirmation" class="auth-input" placeholder="تأكيد كلمة المرور" required>
        </div>

        <button type="submit" class="auth-button">إعادة تعيين كلمة المرور</button>
    </form>
@endsection
