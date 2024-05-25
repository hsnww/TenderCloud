@extends('layouts.auth')

@section('content')
    <div class="auth-title">
        <h2>تأكيد كلمة المرور</h2>
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('هذه منطقة آمنة من التطبيق. يرجى تأكيد كلمة المرور قبل المتابعة.') }}
    </div>

    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.confirm') }}" method="POST">
        @csrf

        <div class="input-with-icon">
{{--            <i class="fas fa-lock icon"></i>--}}
            <input type="password" id="password" name="password" class="auth-input" placeholder="كلمة المرور" required autocomplete="current-password">
        </div>

        <button type="submit" class="auth-button">تأكيد</button>
    </form>
@endsection
