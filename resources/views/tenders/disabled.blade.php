@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>المناقصات الغير نشطة</h1>
        <p>تم إرسال طلب بإلغاء المناقصات التالية .. يمكنك إلغاء الطلب قبل تنفيذ الحذف من قبل إدارة المنصة "<a
                href="{{ route('tenders.index') }}">انتقل للمناقصات النشطة</a>"</p>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Release Date</th>
                 <th>Opening Date</th>
                <th>Document Fee</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($tenders->count() == 0)
                <tr>
                    <td colspan="6">No tenders found.</td>
                </tr>
                @endif
            @foreach($tenders as $tender)
                <tr>
                    <td>{{ $tender->name }}</td>
                    <td>{{ $tender->release_date }}</td>
                     <td>{{ $tender->opening_date }}</td>
                    <td>{{ $tender->document_fee }}</td>
                    <td>{{ $tender->status }}</td>
                    <td>
                        <form action="{{ route('tenders.restore', $tender->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success">Restore Tender</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @
            </tbody>
        </table>
    </div>
@endsection
