<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ config('app.name') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog-rtl/">


    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Amiri:wght@400;700&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.rtl.css') }}" rel="stylesheet">
</head>
<body>

<div class="container p-0">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-end align-items-center">
            <div class="header-buttons">
                @auth
                    <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" id="dropdownCreateAccount" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownCreateAccount">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i>الملف الشخصي</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-credit-card me-2"></i>الباقة والدفع</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"> <i class="fas fa-cogs me-2"></i>إعدادات حساب الشركة</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"> <i class="fas fa-users me-2"></i>المسؤولين</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"> <i class="fas fa-headset me-2"></i>الدعم الفني</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item logout-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                                </a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                @else
                    <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" id="dropdownCreateAccount" data-bs-toggle="dropdown" aria-expanded="false">
                            الدخول
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownCreateAccount">
                            <li><a class="dropdown-item" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}"><i class="fa-solid fa-user-plus me-2"></i>Register</a></li>
                        </ul>
                    </div>
                @endauth

                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownNotifications" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownNotifications">
                        <li><a class="dropdown-item" href="#">عنصر افتراضي 1</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">عنصر افتراضي 2</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownGlobe" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-globe"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownGlobe">
                        <li><a class="dropdown-item" href="#">Ar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">En</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="p-4 p-md-5 mb-4 text-white rounded">
        <div class="d-flex justify-content-between align-items-center px-0">
            <!-- الشعار -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" style="height: 60px;">
            </a>

            <!-- شريط التنقل -->
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-0">
                <div class="container-fluid p-0">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-none d-lg-flex justify-content-center" id="navbarNav">
                        @include('components.navbar-items')
                    </div>
                    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header bg-danger">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Tender Cloud</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            @include('components.navbar-items')
                        </div>
                    </div>
                </div>
            </nav>

            <!-- زر المفضلة -->
            <button class="btn btn-outline-secondary favorite-btn" type="button">
                <i class="fa-regular fa-heart"></i> المفضلة
            </button>
        </div>
    </div>
    <hr>
</div>
<main class="container  mt-1 p-0">
    <div class="row">

        <!-- العمود الأول: نموذج البحث -->
        @include('components.searchTenders')
        <div class="col-md-8 mt-2">
            @include('components.alerts')

            @yield('content')
        </div>
    </div>
</main>

<footer>
    <!-- الطبقة العليا باللون الأسود -->
    <div class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <!-- العمود الأول: لوقو وتعريف بالشركة -->
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('images/logo-light.png') }}" alt="Logo" style="height: 40px;">
                    <p class="mt-2">أول شركة في المملكة العربية السعودية تختص في عمل المناقصات للمشاريع بين الشركات</p>
                </div>
                <!-- العمود الثاني: روابط مهمة -->
                <div class="col-md-2 mb-3">
                    <h5>روابط مهمة</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">لوحة التحكم</a></li>
                        <li><a href="#" class="text-white">المشاريع</a></li>
                        <li><a href="#" class="text-white">فواتيري</a></li>
                        <li><a href="#" class="text-white">سياسة الاستخدام</a></li>
                    </ul>
                </div>
                <!-- العمود الثالث: حسابي -->
                <div class="col-md-2 mb-3">
                    <h5>حسابي</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">إعدادات حساب الشركة</a></li>
                        <li><a href="#" class="text-white">اشتراكي</a></li>
                        <li><a href="#" class="text-white">المسؤولين</a></li>
                    </ul>
                </div>
                <!-- العمود الرابع: تواصل معنا -->
                <div class="col-md-2 mb-3">
                    <h5>تواصل معنا</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">058234678</a></li>
                        <li><a href="mailto:info@tendercloud.com" class="text-white">info@tendercloud.com</a></li>
                        <li><a href="#" class="text-white">الدعم الفني</a></li>
                    </ul>
                </div>
                <!-- العمود الخامس: اشترك في النشرة الإخبارية -->
                <div class="col-md-3 mb-3">
                    <h5>اشترك في النشرة الإخبارية</h5>
                    <p>اشترك الآن للحصول على آخر الأخبار والعروض.</p>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني" aria-label="أدخل بريدك الإلكتروني" aria-describedby="button-addon2">
                            <button class="btn btn-warning" type="button" id="button-addon2"><i class="fa-solid fa-paper-plane text-white"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- الطبقة السفلى باللون المخصص -->
    <div class="custom-bg-danger text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p>جميع الحقوق محفوظة لمنصة تندر كلاود @ 2024</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-2 social-icon">
                        <i class="fa-brands fa-twitter p-2 rounded-circle"></i>
                    </a>
                    <a href="#" class="text-white me-2 social-icon">
                        <i class="fa-brands fa-facebook p-2 rounded-circle"></i>
                    </a>
                    <a href="#" class="text-white me-2 social-icon">
                        <i class="fa-brands fa-linkedin p-2 rounded-circle"></i>
                    </a>
                    <a href="#" class="text-white social-icon">
                        <i class="fa-brands fa-instagram p-2 rounded-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
