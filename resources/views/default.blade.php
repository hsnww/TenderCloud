@extends('layouts.app')

@section('content')
             @include('components.alerts')

            <!-- العمود الثاني: ودجت الإشعارات وودجت المفضلة -->
                     <div class="widget-header d-flex justify-content-between align-items-center">
                        <p class="h2">المناقصات الجديدة </p>
                        <a href="{{ route('tenders') }}" class="view-all">عرض الكل</a>
                    </div>
                    <div class="list-group m-2">
                        <!-- تكرار الإشعارات -->
                        @foreach($tenders as $tender)
                        <div class="list-group-item list-group-item-action d-flex align-items-center mt-2">
                            <div>
                                <div><h3>{{ $tender->name }}</h3></div>
                                <p>{{ $tender->description }}</p>
                                <p>{{ $tender->company? $tender->company->name : 'لا يوجد اسم'}}</p>
                                <h4 class="badge bg-secondary">تاريخ طرح المناقصة : {{ $tender->submission_deadline }}</h4>
                                 <p class="badge bg-danger">تاريخ فتح المظاريف: {{ $tender->opening_date }}</p>
                                <div>
                                    <a href="{{ route('tenders.show', $tender->id)  }}" class="btn btn-warning vtn-sm">التفاصيل</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- تكرار العناصر الأخرى حسب الحاجة -->
                    </div>

 @endsection
