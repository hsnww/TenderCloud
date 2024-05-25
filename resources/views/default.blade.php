@extends('layouts.tender')

@section('content')
    <div class="container">
        <div class="row">
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
                                <option value="entity1">الجهة 1</option>
                                <option value="entity2">الجهة 2</option>
                                <option value="entity3">الجهة 3</option>
                                <option value="entity4">الجهة 4</option>
                                <option value="entity5">الجهة 5</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="activity">النشاط</label>
                            <select id="activity" name="activity" class="form-control">
                                <option value="activity1">النشاط 1</option>
                                <option value="activity2">النشاط 2</option>
                                <option value="activity3">النشاط 3</option>
                                <option value="activity4">النشاط 4</option>
                                <option value="activity5">النشاط 5</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="project_type">نوع المشروع</label>
                            <select id="project_type" name="project_type" class="form-control">
                                <option value="type1">نوع المشروع 1</option>
                                <option value="type2">نوع المشروع 2</option>
                                <option value="type3">نوع المشروع 3</option>
                                <option value="type4">نوع المشروع 4</option>
                                <option value="type5">نوع المشروع 5</option>
                            </select>
                        </div>
                        <button type="submit" class="p-2 rounded-md flex items-center justify-center search-button">
                            <i class="fas fa-search ml-2"></i> عرض المشاريع
                        </button>
                    </form>
                </div>
            </div>

            <!-- العمود الثاني: ودجت الإشعارات وودجت المفضلة -->
            <div class="col-md-4 mb-4">
                <div class="widget mb-4">
                    <div class="widget-header d-flex justify-content-between align-items-center">
                        <h2 class="h4">الإشعارات <span class="badge badge-red">9</span></h2>
                        <a href="" class="view-all">عرض الكل</a>
                    </div>
                    <div class="list-group">
                        <!-- تكرار الإشعارات -->
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="far fa-check-circle text-success mr-3"></i>
                            <div>
                                <div>عنوان الإشعار 1</div>
                                <small class="text-muted">2023-01-01</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="far fa-check-circle text-success mr-3"></i>
                            <div>
                                <div>عنوان الإشعار 1</div>
                                <small class="text-muted">2023-01-01</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="far fa-check-circle text-success mr-3"></i>
                            <div>
                                <div>عنوان الإشعار 1</div>
                                <small class="text-muted">2023-01-01</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="far fa-check-circle text-success mr-3"></i>
                            <div>
                                <div>عنوان الإشعار 1</div>
                                <small class="text-muted">2023-01-01</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="far fa-check-circle text-success mr-3"></i>
                            <div>
                                <div>عنوان الإشعار 1</div>
                                <small class="text-muted">2023-01-01</small>
                            </div>
                        </div>
                        <!-- تكرار العناصر الأخرى حسب الحاجة -->
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-header d-flex justify-content-between align-items-center">
                        <h2 class="h4">المفضلة <span class="badge badge-red">13</span></h2>
                        <span class="view-all">عرض الكل</span>
                    </div>
                    <div class="list-group">
                        <!-- تكرار المفضلات -->
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>عنوان المفضلة 1</div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>عنوان المفضلة 1</div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>عنوان المفضلة 1</div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>عنوان المفضلة 1</div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>عنوان المفضلة 1</div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <!-- تكرار العناصر الأخرى حسب الحاجة -->
                    </div>
                </div>
            </div>

            <!-- العمود الثالث: ودجت مشاريعي -->
            <div class="col-md-4 mb-4">
                <div class="widget">
                    <div class="widget-header d-flex justify-content-between align-items-center">
                        <h2 class="h4">مشاريعي <span class="badge badge-red">5</span></h2>
                        <span class="view-all">عرض الكل</span>
                    </div>
                    <div class="list-group">
                        <!-- تكرار المشاريع -->
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div>عنوان المشروع 1</div>
                                <small class="badge-bought">تم شراء كراسة الشروط</small>
                                <!-- شرط إضافي -->
                                <small class="badge-done">تم تقديم العرض</small>
                            </div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div>عنوان المشروع 1</div>
                                <small class="badge-bought">تم شراء كراسة الشروط</small>
                                <!-- شرط إضافي -->
                            </div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div>عنوان المشروع 1</div>
                                <small class="badge-bought">تم شراء كراسة الشروط</small>
                                <!-- شرط إضافي -->
                            </div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div>عنوان المشروع 1</div>
                                <small class="badge-bought">تم شراء كراسة الشروط</small>
                                <!-- شرط إضافي -->
                            </div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div>عنوان المشروع 1</div>
                                <small class="badge-bought">تم شراء كراسة الشروط</small>
                                <!-- شرط إضافي -->
                            </div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div>عنوان المشروع 1</div>
                                <small class="badge-bought">تم شراء كراسة الشروط</small>
                                <!-- شرط إضافي -->
                            </div>
                            <div class="dropdown">
                                <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">مشاهدة</a>
                                    <a class="dropdown-item" href="#">إزالة</a>
                                </div>
                            </div>
                        </div>
                        <!-- تكرار العناصر الأخرى حسب الحاجة -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
