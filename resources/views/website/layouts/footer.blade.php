<footer class="site-footer pt-5" dir="rtl" style="background-color: #0f172a; color: #e2e8f0; text-align:right">
    <div class="container">
        <div class="row g-5">

            <!-- العمود الأول: شعار الجامعة + نبذة مختصرة -->
            <div class="col-lg-4 col-md-6 col-12 text-center text-lg-end" style="text-align:right">
                <div class="footer-logo-wrapper mb-4"style="text-align:right">
                    <img src="{{ asset('website/images/logo.png') }}"
                         class="img-fluid mb-3 shadow rounded"
                         alt="جامعة الشهباء الخاصة"
                         style="height: 90px; object-fit: contain;">
                    <h4 class="text-white fw-bold mb-2">جامعة الشهباء الخاصة</h4>
                    <p class="small opacity-80 mb-3">حلب – سوريا</p>
                    <p class="text-light small lh-lg">
                        نظام إلكتروني متطور لتلقي الشكاوى والاقتراحات من الطلاب وأعضاء الهيئة التدريسية والإدارية بكل سرية وشفافية.
                    </p>
                </div>
            </div>

            <!-- العمود الثاني: روابط سريعة -->
            <div class="col-lg-2 col-md-6 col-12">
                <h5 class="text-warning fw-bold mb-4 position-relative d-inline-block">
                    روابط سريعة
                    <span class="underline"></span>
                </h5>
                <ul class="footer-menu list-unstyled">
                    <li class="mb-3">
                        <a href="{{ route('main_home') }}" class="text-light hover-yellow text-decoration-none small">
                            <i class="bi bi-house-door-fill ms-2"></i> الرئيسية
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#section_2" class="text-light hover-yellow text-decoration-none small smooth-scroll">
                            <i class="bi bi-info-circle-fill ms-2"></i> عن النظام
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('complaints.track.form') }}" class="text-light hover-yellow text-decoration-none small">
                            <i class="bi bi-search ms-2"></i> تتبع الشكوى
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#contact" class="text-light hover-yellow text-decoration-none small smooth-scroll">
                            <i class="bi bi-headset ms-2"></i> تواصل معنا
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-light hover-yellow text-decoration-none small">
                            <i class="bi bi-shield-check ms-2"></i> سياسة الخصوصية
                        </a>
                    </li>
                </ul>
            </div>

            <!-- العمود الثالث: معلومات التواصل -->
            <div class="col-lg-3 col-md-6 col-12">
                <h5 class="text-warning fw-bold mb-4 position-relative d-inline-block">
                    تواصل معنا
                    <span class="underline"></span>
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone-fill text-warning fs-5 ms-3"></i>
                        <div>
                            <div class="small text-light">الهاتف</div>
                            <a href="tel:+963XXXXXXXXX" class="text-light hover-yellow text-decoration-none">+963 21 123 4567</a>
                        </div>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-envelope-fill text-warning fs-5 ms-3"></i>
                        <div>
                            <div class="small text-light">البريد الإلكتروني</div>
                            <a href="mailto:complaints@shahba.edu.sy" class="text-light hover-yellow text-decoration-none">
                                complaints@shahba.edu.sy
                            </a>
                        </div>
                    </li>
                    <li class="mb-4 d-flex align-items-start">
                        <i class="bi bi-geo-alt-fill text-warning fs-5 ms-3 mt-1"></i>
                        <div>
                            <div class="small text-light">العنوان</div>
                            <p class="text-light mb-0 small">
                                حلب – سوريا<br>
                                شارع الجامعة – مقابل حديقة الشهباء
                            </p>
                        </div>
                    </li>
                    <li>
                        <a href="https://maps.google.com/?q=Shahba+University+Aleppo" target="_blank"
                           class="btn btn-outline-warning btn-sm px-4 rounded-pill hover-bg-yellow">
                            <i class="bi bi-geo-alt"></i> احصل على الاتجاهات
                        </a>
                    </li>
                </ul>
            </div>

            <!-- العمود الرابع: اشتراك + زر تقديم شكوى سريع -->
            <div class="col-lg-3 col-md-6 col-12 text-center text-lg-start">
                <h5 class="text-warning fw-bold mb-4 position-relative d-inline-block">
                    كن على اطلاع
                    <span class="underline"></span>
                </h5>
                <p class="text-light small mb-3">
                    اشترك ليصلك إشعار عند تحديث حالة شكواك
                </p>
                <form action="#" method="POST" class="d-flex mb-4">
                    @csrf
                    <input type="email" class="form-control rounded-pill text-center" 
                           placeholder="بريدك الجامعي" required>
                    <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm mx-2">
                        <i class="bi bi-bell-fill"></i>
                    </button>
                </form>

                @auth
                    <a href="{{ route('complaints.create') }}"
                       class="btn btn-primary btn-lg w-100 rounded-pill shadow-lg shadow-lg hover-lift fw-bold">
                        <i class="bi bi-file-earmark-plus-fill me-2"></i>
                        تقديم شكوى جديدة
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="btn btn-outline-light btn-lg w-100 rounded-pill shadow-lg hover-lift">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        تسجيل الدخول
                    </a>
                @endauth
            </div>

        </div>
    </div>

    <!-- الشريط السفلي -->
    <div class="site-footer-bottom border-top border-secondary py-4 mt-5" style="background-color: #1e293b;">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-8 col-12">
                    <p class="small mb-0 text-light opacity-90">
                        © {{ date('Y') }} 
                        <a href="{{ url('/') }}" class="text-warning fw-bold text-decoration-none">
                            جامعة الشهباء الخاصة
                        </a>
                        · جميع الحقوق محفوظة
                        <br>
                        <span class="opacity-70">
                            تم التطوير بواسطة إدارة تقنية المعلومات – جامعة الشهباء
                        </span>
                    </p>
                </div>
                <div class="col-lg-4 col-12 mt-3 mt-lg-0">
                    <ul class="social-icon d-flex justify-content-center justify-content-lg-end gap-4 mb-0">
                        <li><a href="#" class="text-light fs-4 hover-yellow"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#" class="text-light fs-4 hover-yellow"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#" class="text-light fs-4 hover-yellow"><i class="bi bi-telegram"></i></a></li>
                        <li><a href="#" class="text-light fs-4 hover-yellow"><i class="bi bi-whatsapp"></i></a></li>
                        <li><a href="#" class="text-light fs-4 hover-yellow"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- الأنماط الإضافية (RTL محسنة) -->
<style>
    .site-footer {
        font-family: 'Cairo', 'Segoe UI', sans-serif;
    }
    .underline {
        position: absolute;
        bottom: -10px;
        right: 0;
        width: 60px;
        height: 4px;
        background: #fbbf24;
        border-radius: 3px;
    }
    .hover-yellow {
        transition: all 0.3s ease;
    }
    .hover-yellow:hover {
        color: #fbbf24 !important;
        padding-right: 8px;
    }
    .hover-lift {
        transition: all 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(251, 191, 36, 0.3);
    }
    .hover-bg-yellow:hover {
        background-color: #fbbf24 !important;
        color: #1e293b !important;
    }
    .social-icon a {
        transition: all 0.3s ease;
    }
    .social-icon a:hover {
        transform: translateY(-4px) scale(1.2);
    }
</style>