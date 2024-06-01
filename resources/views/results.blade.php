@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>نتائج البحث</h1>

        @if($tenders_results->isEmpty())
            <p>لا توجد نتائج.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>اسم المشروع</th>
                    <th>الشركة</th>
                    <th>تاريخ الإصدار</th>
                    <th>الموعد النهائي</th>
                    <th>تاريخ الافتتاح</th>
                    <th>رسوم الوثيقة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tenders_results as $tender)
                    <tr>
                        <td><a href="{{ route('tenders.show', $tender->id) }}">{{ $tender->name }}</a></td>
                        <td>{{ $tender->company->name }}</td>
                        <td>{{ $tender->release_date }}</td>
                        <td>{{ $tender->submission_deadline }}</td>
                        <td>{{ $tender->opening_date }}</td>
                        <td>{{ $tender->document_fee }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
