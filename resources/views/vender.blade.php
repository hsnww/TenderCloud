@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
