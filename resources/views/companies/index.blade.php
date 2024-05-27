@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-start m-3">إدارة حساب الشركة</h2>
            <p class="text-start m-3">منطقة مدير حساب الشركة .. يجب أن تملك صلاحيات Companies members</p>
        </div>
        <div class="col-12">
            <hr class="text-danger mx-auto" style="width: 75%">
            <h4>اسم اشركة: {{ $company->name }}</h4>
            <p>مدير حساب الشركة: {{ $company->users->first()->name }}</p>
            <p>المدينة: {{ $company->city }}</p>
            <p>العنوان: {{ $company->address }}</p>
            <p>المجال: {{ $company->industry }}</p>
            <p>البريد الالكترونية: {{ $company->email }}</p>
            <p>الهاتفة: {{ $company->phone }}</p>
            <p>الجوال : {{ $company->mobile }}</p>
            <p>عدد الموظفين : {{ $company->employees_count }}</p>
            <p>تاريخ الإنشاء : {{ $company->established_at }}</p>
        </div>
    </div>
@endsection
