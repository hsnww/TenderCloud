@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 m-3 p-3">

        <h2>تقديم عطاء على مناقصة : {{ $tender->name }}</h2>
            <hr class="w-3/4">
        <div class="tender-info">
            <h3>معلومات المناقصة</h3>
            <p><strong>اسم المناقصة:</strong> {{ $tender->name }}</p>
            <p><strong>وصف المناقصة:</strong> {{ $tender->description }}</p>
            <p><strong>تاريخ الإصدار:</strong> {{ $tender->release_date }}</p>
            <p><strong>الموعد النهائي للتقديم:</strong> {{ $tender->submission_deadline }}</p>
            <p><strong>تاريخ فتح العروض:</strong> {{ $tender->opening_date }}</p>
            <p><strong>رسوم الوثائق:</strong> {{ $tender->document_fee }}</p>
            <p><strong>الحالة:</strong> {{ $tender->status }}</p>
        </div>

        <div class="company-info">
            <h3>معلومات الشركة</h3>
            <p><strong>اسم الشركة:</strong> {{ $company->name }}</p>
            <p><strong>المدينة:</strong> {{ $company->city }}</p>
            <p><strong>العنوان:</strong> {{ $company->address }}</p>
            <p><strong>الصناعة:</strong> {{ $company->industry }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $company->email }}</p>
            <p><strong>الهاتف:</strong> {{ $company->phone }}</p>
            <p><strong>الجوال:</strong> {{ $company->mobile }}</p>
        </div>
        <div class="col col-lg-6">
        <form action="{{ route('vendors.bid_requests.store') }}" method="POST">
            @csrf
            <div class="form-group m-2">
                <label for="description">وصف العطاء</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group m-2">
                <label for="amount">مبلغ العطاء المقدم</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            <input type="hidden" name="tender_id" value="{{ $tender->id }}">
            <button type="submit" class="btn btn-primary m-3">إرسال</button>
        </form>
        </div>
    </div>

     </div>
@endsection
