@extends('layouts.app')

@section('content')
             @include('components.alerts')


            <div class="col-md-12">
                <h1>عرض المناقصات النشطة</h1>
                <div class="list-group">
                    @foreach($alltenders as $tender)
                            @php
                                $hasBidRequest = false;
                                if (Auth::check()) {
                                    $vendorIds = auth()->user()->vendors->pluck('id')->toArray();
                                    $hasBidRequest = $tender->bidRequests()->whereIn('vendor_id', $vendorIds)->exists();
                                }
                            @endphp
                        <a href="{{ route('tenders.show', $tender->id)  }}" class="list-group-item list-group-item-action {{ $hasBidRequest ? 'bg-light bg-gradient text-info disable' : '' }}" aria-current="true">
                        <div class="d-flex w-100 justify-content-between mt-2">
                            <h2 class="mb-1">{{ $tender->name }}</h2>
                            <small>{{ \Carbon\Carbon::parse($tender->release_date)->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">{{ $tender->description }}.</p>
                        <h3 class="mb-1">{{ $tender->company? $tender->company->name : 'لا يوجد اسم'}}.</h3>
                        <small>تاريخ طرح المناقصة : {{ $tender->submission_deadline }}.</small>
                        <small>تاريخ فتح المظاريف: {{ $tender->opening_date }}</small>
                    </a>
                     @endforeach

                </div>

            </div>
             <div class="d-flex justify-content-center mt-2 pagination">
                 {{ $alltenders->links() }}
             </div>

    @endsection
