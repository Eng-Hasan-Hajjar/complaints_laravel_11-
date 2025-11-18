<nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #1e293b;">
    <div class="container">
        <!-- الشعار -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('website/images/logo.png') }}" class="logo img-fluid me-3" alt="قلب طيب" style="height: 50px;">
            <div class="text-white">
                <strong class="fw-bold fs-4">قلب طيب</strong>
                <small class="d-block opacity-75" style="font-size: 0.8rem;">منظمة خيرية غير ربحية</small>
            </div>
        </a>

        <!-- زر الهامبرغر للموبايل -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل القائمة">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- القوائم + أزرار المصادقة -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2 gap-lg-4">

                <!-- القوائم الرئيسية -->
                <li class="nav-item">
                    <a class="nav-link text-white fw-500 smooth-scroll" href="#top">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-500 smooth-scroll" href="#section_2">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-500 smooth-scroll" href="#section_3">مشاريعنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-500 smooth-scroll" href="#section_4">التطوع</a>
                </li>

                <!-- دروب داون الأخبار -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-500" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        الأخبار
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2">
                        <li><a class="dropdown-item" href="">قائمة الأخبار</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">تفاصيل الخبر</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-500 smooth-scroll" href="#section_6">اتصل بنا</a>
                </li>

                <!-- زر التبرع -->
                <li class="nav-item">
                    <a href=""
                       class="nav-link btn btn-warning text-dark fw-bold px-4 rounded-pill shadow-sm hover-scale">
                        <i class="bi bi-heart-fill me-1"></i> قدم الشكوى 
                    </a>
                </li>

                <!-- أزرار تسجيل الدخول / لوحة التحكم / تسجيل الخروج -->
             
            </ul>
        </div>
    </div>
</nav>

