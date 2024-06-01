<div class="col-md-4 p-5">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 rounded-lg search-form text-white">
            <h2 class="text-xl font-bold mb-4">البحث عن مشاريع</h2>
            <form action="{{ route('tenders.search') }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <input type="text" name="project_name" placeholder="اسم المشروع" class="form-control" value="{{ old('project_name') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="project_number" placeholder="رقم المشروع" class="form-control" value="{{ old('project_number') }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="entity">الجهة</label>
                    <select id="entity" name="entity" class="form-control">
                        <option value="">اختيار الجهة</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('entity') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="activity">النشاط</label>
                    <select id="activity" name="activity" class="form-control">
                        <option value="">اختيار النشاط</option>
                        @foreach($activities as $activity)
                            <option value="{{ $activity->id }}" {{ old('activity') == $activity->id ? 'selected' : '' }}>{{ $activity->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="project_type">نوع المشروع</label>
                    <select id="project_type" name="project_type" class="form-control">
                        <option value="">اختيار نوع المشروع</option>
                        @foreach($projects_types as $project_type)
                            <option value="{{ $project_type->id }}" {{ old('project_type') == $project_type->id ? 'selected' : '' }}>{{ $project_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="p-2 rounded-md flex items-center justify-center search-button">
                    <i class="fas fa-search ml-2"></i> عرض المشاريع
                </button>
            </form>

        </div>
    </div>
</div>
