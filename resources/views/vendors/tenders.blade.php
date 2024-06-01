@extends('layouts.dashboard')


@section('content')
    <ul class="list-group list-group-flush">
        @foreach ($my_tenders as $tender)
            <li class="list-group-item">
                <h4>اسم المناقصة :<a href="{{ route('tenders.show', $tender->id) }}" class="text-info">{{ $tender->name }}</a></h4>
                <p>الوصف : {{ $tender->description }}</p>
                <p>الشركة : {{ $tender->company->name }}</p>
                <p>موعد فتح المظاريف : {{ $tender->opening_date }}</p>
            </li>
        @endforeach
    </ul>
@endsection
