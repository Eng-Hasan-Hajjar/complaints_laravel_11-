<nav class="navbar navbar-expand-lg shadow-lg sticky-top" style="background-color: #0f172a; backdrop-filter: blur(10px);">
    <div class="container position-relative">

        <!-- شعار الجامعة + الاسم -->
        <a class="navbar-brand d-flex align-items-center py-3" href="{{ route('main_home') }}">
            <img src="{{ asset('website/images/logo.png') }}" 
                 alt="جامعة الشهباء" 
                 class="me-3 rounded shadow" 
                 style="height: 58px; object-fit: contain;">
            <div class="text-white">
                <div class="fw-bold fs-4 lh-1">جامعة الشهباء</div>
                <small class="opacity-80 fw-medium">نظام الشكاوى والاقتراحات الإلكتروني</small>
            </div>
        </a>

        <!-- زر القائمة للموبايل -->
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#universityNavbar"
                aria-controls="universityNavbar" aria-expanded="false" aria-label="تبديل القائمة">
            <i class="bi bi-list fs-3"></i>
        </button>

        <!-- القوائم الرئيسية -->
        <div class="collapse navbar-collapse" id="universityNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-3 gap-lg-5">

                <!-- الرئيسية -->
                <li class="nav-item">
                    <a class="nav-link text-white fw-600 position-relative smooth-scroll" href="{{ route('main_home') }}">
                        الرئيسية
                        <span class="nav-indicator"></span>
                    </a>
                </li>

                <!-- عن النظام -->
                <li class="nav-item">
                    <a class="nav-link text-white fw-600 position-relative" href="#">
                        عن النظام
                        <span class="nav-indicator"></span>
                    </a>
                </li>

                <!-- دليل الاستخدام -->
                <li class="nav-item">
                    <a class="nav-link text-white fw-600 position-relative" href="#">
                        دليل الاستخدام
                        <span class="nav-indicator"></span>
                    </a>
                </li>

                <!-- حالة الشكوى -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-600 d-flex align-items-center gap-1" 
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        تتبع الشكوى
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 p-2">
                        <li>
                            <a class="dropdown-item rounded px-3 py-2 d-flex align-items-center gap-2" href="">
                                <i class="bi bi-search text-primary"></i> تتبع شكوى برقمها
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded px-3 py-2 d-flex align-items-center gap-2" href="">
                                <i class="bi bi-clock-history text-warning"></i> حالة الشكاوى الحالية
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- تواصل معنا -->
                <li class="nav-item">
                    <a class="nav-link text-white fw-600 position-relative" href="#">
                        تواصل معنا
                        <span class="nav-indicator"></span>
                    </a>
                </li>

                <!-- فاصل عمودي -->
                <li class="nav-item d-none d-lg-block">
                    <div class="vr text-white opacity-50 mx-2" style="height: 40px;"></div>
                </li>

                <!-- أزرار المصادقة والإجراءات السريعة -->
                @auth
                    <!-- المستخدم مسجل دخوله -->
                    <li class="nav-item">
                        <a href="{{ route('complaints.create') }}" 
                           class="btn btn-warning rounded-pill px-4 py-2 fw-bold shadow hover-lift">
                            <i class="bi bi-plus-circle-fill me-2"></i>
                            تقديم شكوى جديدة
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white d-flex align-items-center gap-2 dropdown-toggle" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4"></i>
                            <span class="d-none d-xl-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> لوحة التحكم</a></li>
                            <li><a class="dropdown-item" href="{{ route('complaints.index') }}"><i class="bi bi-list-ul me-2"></i> شكاواي</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> تسجيل الخروج
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- الزائر غير مسجل -->
                    <li class="nav-item">
                        <a href="{{ route('login') }}" 
                           class="btn btn-outline-light rounded-pill px-4 py-2 fw-bold hover-bg-white">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            تسجيل الدخول
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ms-2">
                            <a href="{{ route('register') }}" 
                               class="btn btn-light text-dark rounded-pill px-4 py-2 fw-bold">
                                <i class="bi bi-person-plus me-2"></i>
                                إنشاء حساب
                            </a>
                        </li>
                    @endif
                @endauth

            </ul>
        </div>
    </div>
</nav>

<!-- الأنماط الإضافية للـ Navbar -->
<style>
    .navbar {
        transition: all 0.4s ease;
        padding: 0.8rem 0;
    }
    .navbar.scrolled {
        padding: 0.5rem 0;
        background-color: rgba(15, 23, 42, 0.95) !important;
    }
    .nav-link {
        transition: all 0.3s ease;
        position: relative;
    }
    .nav-link:hover, .nav-link.active {
        color: #fbbf24 !important;
    }
    .nav-indicator {
        position: absolute;
        bottom: -8px;
        left: 50%;
        width: 0;
        height: 3px;
        background: #fbbf24;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }
    .nav-link:hover .nav-indicator,
    .nav-link.active .nav-indicator {
        width: 70%;
    }
    .hover-lift {
        transition: all 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(251, 191, 36, 0.3);
    }
    .hover-bg-white:hover {
        background: white !important;
        color: #0f172a !important;
    }
    .dropdown-menu {
        background: #1e293b;
        border: 1px solid #475569;
    }
    .dropdown-item {
        color: #e2e8f0;
        transition: all 0.3s ease;
    }
    .dropdown-item:hover {
        background: #334155;
        color: #fbbf24;
        padding-left: 1.5rem;
    }
</style>

<!-- تأثير التمرير (يصغر الـ Navbar عند التمرير) -->
<script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>