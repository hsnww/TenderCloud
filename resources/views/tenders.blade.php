@extends('layouts.tender')

@section('content')
    <div class="container">
        <div class="row">
            @include('components.alerts')
            <!-- العمود الأول: نموذج البحث -->
            <div class="col-md-4 mb-4">
                <div class="p-4 rounded-lg search-form text-white">
                    <h2 class="text-xl font-bold mb-4">البحث عن مشاريع</h2>
                    <form action="#" method="GET">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <input type="text" name="project_name" placeholder="اسم المشروع" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="project_number" placeholder="رقم المشروع" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="entity">الجهة</label>
                            <select id="entity" name="entity" class="form-control">
                                @foreach($companies as $company)
                                    <option value="entity1">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="activity">النشاط</label>
                            <select id="activity" name="activity" class="form-control">
                                @foreach($activities as $activity)
                                    <option value="activity1">{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="project_type">نوع المشروع</label>
                            <select id="project_type" name="project_type" class="form-control">
                                @foreach($projects_types as $project_type)
                                    <option value="type1">{{ $project_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="p-2 rounded-md flex items-center justify-center search-button">
                            <i class="fas fa-search ml-2"></i> عرض المشاريع
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-8 mb-4">
                <div class="widget mb-4">

            <div class="col-md-12">
                <h1>عرض المناقصات النشطة</h1>
                <div class="list-group">
                    @foreach($alltenders as $tender)
                        @php
                            $vendorIds = auth()->user()->vendors->pluck('id')->toArray();
                            $hasBidRequest = $tender->bidRequests()->whereIn('vendor_id', $vendorIds)->exists();
                        @endphp

                        <a href="{{ route('alltenders.show', $tender->id)  }}" class="list-group-item list-group-item-action {{ $hasBidRequest ? 'bg-light bg-gradient text-info disable' : '' }}" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h2 class="mb-1">{{ $tender->name }}</h2>
                            <small>{{ \Carbon\Carbon::parse($tender->release_date)->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">{{ $tender->description }}.</p>
                        <h3 class="mb-1">{{ $tender->company? $tender->company->name : 'لا يوجد اسم'}}.</h3>
                        <small>تاريخ طرح المناقصة : {{ $tender->submission_deadline }}.</small>
                        <small>تاريخ فتح المظاريف: {{ $tender->opening_date }}</small>
                    </a>
                        <hr>
                    @endforeach

                </div>
{{--                @foreach($tenders as $tender)--}}
{{--                    <div class="list-group-item list-group-item-action d-flex align-items-center">--}}
{{--                        <div>--}}
{{--                            <div><h3>{{ $tender->name }}</h3></div>--}}
{{--                            <p>{{ $tender->description }}</p>--}}
{{--                            <p>{{ $tender->company? $tender->company->name : 'لا يوجد اسم'}}</p>--}}
{{--                            <h4 class="badge bg-secondary">تاريخ طرح المناقصة : {{ $tender->submission_deadline }}</h4>--}}
{{--                            <p class="badge bg-danger">تاريخ فتح المظاريف: {{ $tender->opening_date }}</p>--}}
{{--                            <div>--}}
{{--                                <a href="{{ route('alltenders.show', $tender->id)  }}" class="btn btn-warning vtn-sm">التفاصيل</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
            {{ $alltenders->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection
