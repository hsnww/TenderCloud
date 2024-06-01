<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">الرئيسية</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">من نحن</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">خدماتنا</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">شركاءنا</a>
    </li>
    @auth
        @if(auth()->user()->hasRole('vendor_member'))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">المشاريع</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown10">
                    <li><a class="dropdown-item" href="#">مشروع 1</a></li>
                    <li><a class="dropdown-item" href="#">مشروع 2</a></li>
                    <li><a class="dropdown-item" href="#">مشروع 3</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">دعوات التأهيل</a>
            </li>
            </li>
        @endif
    @endauth
    @isset($url)

    @if ($url)
        <li class="nav-item">
            <a class="nav-link" href="{{ $url }}" tabindex="-1">لوحة التحكم</a>
        </li>
    @endif
    @endisset
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">اتصل بنا</a>
    </li>
</ul>
