@extends('layouts.dashboard')
@section('content')
        @foreach ($tenders as $tender)

        <table class="table">

            <tbody>
            <tr>
                <th scope="row">اسم المناقصة : </th>
                <td><h3><a href="{{ route('tenders.show', $tender->id) }}">{{ $tender->name }}</a></h3></td>
            </tr>
            <tr>
                <th scope="row">الوصف</th>
                <td>{{ $tender->description }}</td>
             </tr>
            <tr>
                <th scope="row">النشاط</th>
                <td>{{ $tender->activity->name }}</td>
             </tr>
            <tr>
                <th scope="row">نوع الطرح</th>
                <td colspan="2">{{ $tender->projectType->name }}</td>
             </tr>
            <tr>
                <th scope="row">تاريخ الإعلان</th>
                <td colspan="2">{{ $tender->release_date }}</td>
             </tr>
            <tr>
                <th scope="row">تاريخ الطرح</th>
                <td colspan="2">{{ $tender->submission_deadline }}</td>
             </tr>
            <tr>
                <th scope="row">تاريخ فتح المظاريف</th>
                <td colspan="2">{{ $tender->opening_date }}</td>
             </tr>
            <tr>
                <th scope="row">قيمة الكراسة</th>
                <td colspan="2">{{ $tender->document_fee }}</td>
             </tr>
            <tr>
                <th scope="row">الحالة</th>
                <td colspan="2">{{ $tender->status }}</td>
             </tr>
            </tbody>
        </table>
        @endforeach

@endsection
