<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    In title add the app name from .env --}}
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>

<header class="header">
    <div class="header-top">


        <div class="icon-btn dropdown">
            @auth

            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}
            </a>
             <div class="dropdown-menu" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-circle"></i> الملف الشخصي
                </a>
                <a class="dropdown-item" href="#"><i class="fas fa-credit-card"></i>الباقة والدفع</a>
                <a class="dropdown-item" href="#"> <i class="fas fa-cogs"></i>إعدادات حساب الشركة</a>
                <a class="dropdown-item" href="#"> <i class="fas fa-users"></i>المسؤولين</a>
                <a class="dropdown-item" href="#"> <i class="fas fa-headset"></i>الدعم الفني</a>
                <a class="dropdown-item logout-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>

             </div>
            @else
                <a class="dropdown-toggle" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> تسجيل الدخول
                </a>
            @endauth

        </div>


         <div class="icon-btn">
            <i class="fas fa-bell"></i>
        </div>
        <div class="icon-btn dropdown">
            <a class="dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-language"></i> تغيير اللغة
            </a>
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-globe"></i> EN
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-globe"></i> AR
                </a>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav class="nav navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
            <a class="nav-link" href="{{ route('dashboard') }}">لوحة التحكم</a>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#">المشاريع</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">مشروع 1</a>
                    <a class="dropdown-item" href="#">مشروع 2</a>
                    <a class="dropdown-item" href="#">مشروع 3</a>
                    <a class="dropdown-item" href="#">مشروع 4</a>
                </div>
            </div>

            <a class="nav-link" href="#">دعوات التأهيل</a>
            <a class="nav-link" href="#">فواتيري</a>

                </div>
            </div>
        </nav>

        <div class="fav-btn">
            <i class="fas fa-heart"></i> المفضلة
        </div>
    </div>
</header>

<hr>

<main>
    <!-- محتوى الصفحة الرئيسي -->
    @yield('content')
</main>

<footer class="footer">
    <div class="footer-top">
        <div class="col-lg-3">
            <img src="images/logo-light.png" alt="Logo">
            <p>أول شركة في المملكة العربية السعودية تختص في عمل المناقصات للمشاريع بين الشركات</p>
        </div>
        <div class="col-lg-2 col-sm-6">
            <h5>روابط مهمة</h5>
            <ul>
                <li><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                <li><a href="#">المشاريع</a></li>
                <li><a href="#">فواتيري</a></li>
                <li><a href="#">سياسة الاستخدام</a></li>
            </ul>
        </div>
        <div class="col-lg-2 col-sm-6">
            <h5>حسابي</h5>
            <ul>
                <li><a href="#">إعدادات حساب الشركة</a></li>
                <li><a href="#">اشتراكي</a></li>
                <li><a href="#">المسؤولين</a></li>
            </ul>
        </div>
        <div class="col-lg-2 col-sm-12">
            <h5>تواصل معنا</h5>
            <ul>
                <li><a href="#">058234678</a></li>
                <li><a href="#">info@tendercloud.com</a></li>
                <li><a href="#">الدعم الفني</a></li>

            </ul>
        </div>
        <div class="col-lg-3 col-sm-12">
            <h5>اشترك في النشرة الاخبارية</h5>
            <p>سجل البريد الالكتروني وسيصلك جميع الاخبار</p>
            <div style="display: flex; background-color: #253D44; padding: 5px; border: 1px solid white; border-radius: 5px;">

                <input type="text" placeholder="بريدك الالكتروني" style="flex: 1; border: none; background: none; color: white;">
                <button style="background-color: #FBB953; border: none; color: white;"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="col-lg-6 col=sm-12"> <p>جميع الحقوق محفوظة لمنصةة تندر كلاود @ 2024</p></div>
        <div class="col-lg-6 col=sm-12">
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        </div>

    </div>
 </footer>

<!-- Load jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
