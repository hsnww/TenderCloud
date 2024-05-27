<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}  | لوحة التحكم | </title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('extra-head')
</head>
<body>
<div class="header">
    <div class="header-top">
        <div class="icon-btn dropdown">
            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-circle"></i> الملف الشخصي</a>
                <a class="dropdown-item logout-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="icon-btn">
            <i class="fas fa-bell"></i>
        </div>
        <div class="icon-btn dropdown">
            <a class="dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-language"></i> تغيير اللغة
            </a>
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-globe"></i> EN</a>
                <a class="dropdown-item" href="#"><i class="fas fa-globe"></i> AR</a>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
</div>

<hr class="separator">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                {{-- كل الأدوار --}}
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> الرئيسية</a>
                <hr class="text-danger">
                {{-- أدمن --}}
                @role('administrator')
                <a class="nav-link" href="{{ url('/admin') }}"><i class="fas fa-cogs"></i> إدارة المنصة</a>
                <a class="nav-link" href="#"><i class="fas fa-sliders-h"></i> إعدادات النظام</a>
                <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> إدارة الأعضاء</a>
                <a class="nav-link" href="{{ route('admin.companies.index') }}"><i class="fas fa-building"></i> إدارة الشركات</a>
                <a class="nav-link" href="{{ route('admin.vendors.index') }}"><i class="fas fa-briefcase"></i> إدارة مزودي الخدمات</a>
                <a class="nav-link" href="{{ route('admin.tenders.index') }}"><i class="fas fa-file-contract"></i> إدارة المناقصات</a>
                <a class="nav-link" href="#"><i class="fas fa-user-shield"></i> إدارة الأدوار</a>
                <a class="nav-link" href="#"><i class="fas fa-lock"></i> إدارة الصلاحيات</a>
                <hr class="text-danger">
                @endrole

                {{-- شركات --}}
                @role('company_member')
                <a class="nav-link" href="{{ url('/companies') }}"><i class="fas fa-cogs"></i> تحكم الشركات</a>
                <a class="nav-link" href="{{ route('companies.edit') }}"><i class="fas fa-building"></i> إعدادات حساب الشركة</a>
{{--                <a class="nav-link" href="#"><i class="fas fa-credit-card"></i> الباقة والدفع</a>--}}
                <a class="nav-link" href="{{ route('tenders.index') }}"><i class="fas fa-file-alt"></i> المناقصات </a>
                <a class="nav-link" href="#"><i class="fas fa-file-invoice"></i> عروض مزودي الخدمات</a>
{{--                <a class="nav-link" href="#"><i class="fas fa-file-invoice"></i> الفواتير</a>--}}
                <a class="nav-link" href="#"><i class="fas fa-users"></i> المسؤولين</a>
                <hr class="text-danger">
                @endrole

                {{-- مزود الخدمات --}}
                @role('vendor_member')
                <a class="nav-link" href="{{ url('/vendors') }}"><i class="fas fa-cogs"></i>تحكم مزود الخدمة</a>
                <a class="nav-link" href="{{ route('vendors.edit') }}"><i class="fas fa-building"></i> إعدادات حساب الشركة</a>
                <a class="nav-link" href="#"><i class="fas fa-file-alt"></i> المناقصات</a>
                <a class="nav-link" href="#"><i class="fas fa-credit-card"></i> الباقة والدفع</a>
                <a class="nav-link" href="#"><i class="fas fa-envelope-open"></i> دعوات التأهيل</a>
                <a class="nav-link" href="#"><i class="fas fa-heart"></i> المفضلة</a>
                <a class="nav-link" href="#"><i class="fas fa-file-invoice"></i> الفواتير</a>
                <a class="nav-link" href="#"><i class="fas fa-users"></i> المسؤولين</a>
                <hr class="text-danger">
                @endrole

                {{-- كل الأدوار --}}
                <a class="nav-link" href="#"><i class="fas fa-envelope"></i> الرسائل</a>
                <a class="nav-link" href="#"><i class="fas fa-bell"></i> التنبيهات</a>
                <a class="nav-link" href="#"><i class="fas fa-headset"></i> الدعم الفني</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="border border-danger m-2 p-2">
                @include('components.alerts')
               @yield('content')
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footer-top">
        <div class="logo-column">
            <img src="{{ asset('images/logo-light.png') }}" alt="Logo">
            <p>تندر كلاود هي منصة تتيح للشركات تقديم العروض والمناقصات بفعالية وسهولة.</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>جميع الحقوق محفوظة لمنصة تندر كلاود @ 2024</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


