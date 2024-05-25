@extends('layouts.auth')

@section('content')
    <div class="auth-title">
        <h2>تأكيد البريد الإلكتروني</h2>
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('شكراً لتسجيلك! قبل البدء، هل يمكنك تأكيد عنوان بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه إليك؟ إذا لم تستلم البريد الإلكتروني، سنرسل لك رابطاً آخر.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <button type="submit" class="auth-button">
                    {{ __('إعادة إرسال البريد الإلكتروني للتأكيد') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-link underline text-sm">
                {{ __('تسجيل الخروج') }}
            </button>
        </form>
    </div>
@endsection
