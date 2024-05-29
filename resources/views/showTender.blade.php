@extends('layouts.tender')

@section('content')
    <div class="container">
        <div class="row">
            @include('components.alerts')
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
            <h1>تفاصيل المناقصة</h1>
             <table class="table">
                <tr>
                    <th>Name</th>
                    <td>{{ $tender->name }}</td>
                </tr>
                 <tr>
                     <th>Activity</th>
                     <td>{{ $tender->activity->name }}</td>
                 </tr>
                 <tr>
                     <th>Project Type</th>
                     <td>{{ $tender->projectType->name }}</td>
                 </tr>
                 <tr>
                 <th>Description</th>
                 <td>{{ $tender->description }}</td>
                 </tr>
                 <tr>
                 <th>Release Date</th>
                 <td>{{ $tender->release_date }}</td>
                 </tr>
                 <tr>
                 <th>Submission Deadline</th>
                 <td>{{ $tender->submission_deadline }}</td>
                 </tr>
                 <tr>
                 <th>Opening Date</th>
                 <td>{{ $tender->opening_date }}</td>
                 </tr>
                 <tr>
                 <th>Document Fee</th>
                 <td>{{ $tender->document_fee }}</td>
                 </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $tender->status }}</td>
                </tr>
            </table>
            <a href="{{ route('alltenders.index') }}" class="btn btn-primary">الرجوع إلى قائمة المناقصات</a>
                    @php
                        $vendorIds = auth()->user()->vendors->pluck('id')->toArray();
                        $hasBidRequest = $tender->bidRequests()->whereIn('vendor_id', $vendorIds)->exists();
                    @endphp
                    @if ($hasBidRequest)
                        <button class="btn btn-success" disabled>تم الشراء</button>
                    @else
                        <a href="{{ route('bid_requests.create', $tender->id) }}" class="btn btn-warning">طلب الدخول إلى المناقصة</a>

                    @endif
                </div>
            </div>
    </div>
    </div>
@endsection
