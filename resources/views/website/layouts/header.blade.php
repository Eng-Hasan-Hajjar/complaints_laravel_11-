<header class="site-header py-3 border-bottom" style="background-color: #0f172a;">
    <div class="container">
        <div class="row align-items-center">

            <!-- الجزء الأيسر: معلومات التواصل + الأيقونات الاجتماعية (على الشاشات الكبيرة) -->
            <div class="col-lg-6 col-12 d-flex flex-wrap align-items-center justify-content-start gap-4 text-white small">
                <p class="d-flex align-items-center mb-0">
                    <i class="bi bi-geo-alt-fill me-2"></i>
             - مدينة حلب   -   جامعة الشهباء -   حلب الجديدة
                </p>
                <p class="d-flex align-items-center mb-0">
                    <i class="bi bi-envelope-fill me-2"></i>
                    <a href="mailto:info@company.com" class="text-white text-decoration-none hover-opacity">
                        info@company.com
                    </a>
                </p>
            </div>

            <!-- الجزء الأيمن: الأيقونات الاجتماعية + أزرار تسجيل الدخول/الخروج -->
            <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                <div class="d-flex align-items-center justify-content-lg-end justify-content-start gap-4">

                    <!-- الأيقونات الاجتماعية (تظهر على الشاشات الكبيرة فقط) -->
                    <ul class="social-icon list-unstyled d-flex mb-0 d-none d-lg-flex gap-3">
                        <li><a href="#" class="social-icon-link bi-twitter text-white fs-5 hover-opacity"></a></li>
                        <li><a href="#" class="social-icon-link bi-facebook text-white fs-5 hover-opacity"></a></li>
                        <li><a href="#" class="social-icon-link bi-instagram text-white fs-5 hover-opacity"></a></li>
                        <li><a href="#" class="social-icon-link bi-youtube text-white fs-5 hover-opacity"></a></li>
                        <li><a href="#" class="social-icon-link bi-whatsapp text-white fs-5 hover-opacity"></a></li>
                    </ul>

                    <!-- أزرار تسجيل الدخول / لوحة التحكم / تسجيل الخروج -->
                    <div class="auth-actions d-flex gap-2 flex-wrap">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="btn btn-outline-light btn-sm px-4 rounded-pill shadow-sm hover-bg-white">
                                    <i class="bi bi-speedometer2 me-1"></i> لوحة التحكم
                                </a>
                                <a href="{{ route('logout') }}"
                                   class="btn btn-outline-danger btn-sm px-4 rounded-pill shadow-sm"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> تسجيل خروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                   class="btn btn-outline-light btn-sm px-4 rounded-pill shadow-sm hover-bg-white">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> تسجيل دخول
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="btn btn-primary btn-sm px-4 rounded-pill shadow-sm">
                                        <i class="bi bi-person-plus me-1"></i> إنشاء حساب
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>









