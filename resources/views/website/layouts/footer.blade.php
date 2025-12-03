<footer class="site-footer pt-5" style="background-color: #0f172a; color: #e2e8f0;">
    <div class="container">
        <div class="row g-5">

            <!-- العمود الأول: الشعار -->
            <div class="col-lg-3 col-md-6 col-12 text-center text-md-start">
                <div class="footer-logo-wrapper mb-4">
                    <img src="{{ asset('images/logo.png') }}" class="logo img-fluid" alt="قلب طيب" style="height: 80px;">
                    <h4 class="text-white mt-3 mb-1 fw-bold">جامعة الشهباء </h4>
                    <p class="small opacity-75">   </p>
                </div>
            </div>

            <!-- العمود الثاني: روابط سريعة -->
            <div class="col-lg-3 col-md-6 col-12">
                <h5 class="site-footer-title text-warning mb-4 position-relative d-inline-block">
                    روابط سريعة
                    <span class="underline"></span>
                </h5>
                <ul class="footer-menu list-unstyled">
                    <li class="footer-menu-item mb-2">
                        <a href="#section_2" class="footer-menu-link text-light smooth-scroll hover-yellow">
                            <i class="bi bi-arrow-left-circle me-2"></i> قصتنا
                        </a>
                    </li>
                    <li class="footer-menu-item mb-2">
                        <a href="" class="footer-menu-link text-light hover-yellow">
                            <i class="bi bi-newspaper me-2"></i>  
                        </a>
                    </li>
                    <li class="footer-menu-item mb-2">
                        <a href="#section_3" class="footer-menu-link text-light smooth-scroll hover-yellow">
                            <i class="bi bi-briefcase me-2"></i> مشاريعنا
                        </a>
                    </li>
                    <li class="footer-menu-item mb-2">
                        <a href="#section_4" class="footer-menu-link text-light smooth-scroll hover-yellow">
                            <i class="bi bi-people me-2"></i> كن متطوعًا
                        </a>
                    </li>
                    <li class="footer-menu-item mb-2">
                        <a href="#section_6" class="footer-menu-link text-light smooth-scroll hover-yellow">
                            <i class="bi bi-handshake me-2"></i> شارك معنا
                        </a>
                    </li>
                </ul>
            </div>

            <!-- العمود الثالث: معلومات التواصل -->
            <div class="col-lg-3 col-md-6 col-12">
                <h5 class="site-footer-title text-warning mb-4 position-relative d-inline-block">
                    تواصل معنا
                    <span class="underline"></span>
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <p class="d-flex align-items-center text-light">
                            <i class="bi bi-telephone-fill text-warning me-3 fs-5"></i>
                            <a href="tel:+471202409600" class="site-footer-link hover-yellow">+47 120 240 9600</a>
                        </p>
                    </li>
                    <li class="mb-3">
                        <p class="d-flex align-items-center text-light">
                            <i class="bi bi-envelope-fill text-warning me-3 fs-5"></i>
                            <a href="mailto:donate@qalb-tayeb.org" class="site-footer-link hover-yellow">donate@qalb-tayeb.org</a>
                        </p>
                    </li>
                    <li class="mb-4">
                        <p class="d-flex align-items-start text-light">
                            <i class="bi bi-geo-alt-fill text-warning me-3 fs-5 mt-1"></i>
                            <span>أكيرس هوسستراندا 20،<br>0150 أوسلو، النرويج</span>
                        </p>
                    </li>
                    <li>
                        <a href="https://maps.google.com/?q=Akershusstranda+20,+0150+Oslo" target="_blank"
                           class="btn btn-outline-warning btn-sm px-4 rounded-pill shadow-sm hover-bg-yellow">
                            <i class="bi bi-geo-alt me-2"></i> احصل على الاتجاهات
                        </a>
                    </li>
                </ul>
            </div>

            <!-- العمود الرابع: اشتراك في النشرة + تبرع سريع -->
            <div class="col-lg-3 col-md-6 col-12">
                <h5 class="site-footer-title text-warning mb-4 position-relative d-inline-block">
                    كن على تواصل
                    <span class="underline"></span>
                </h5>
                <p class="text-light mb-3">اشترك في النشرة البريدية ليصلك كل جديد</p>
                <form action="" method="POST" class="d-flex mb-4">
                    @csrf
                    <input type="email" name="email" class="form-control rounded-pill me-2" placeholder="بريدك الإلكتروني" required>
                    <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm">
                        <i class="bi bi-send"></i>
                    </button>
                </form>

                <a href=""
                   class="btn btn-lg btn-warning text-dark w-100 rounded-pill shadow-lg hover-scale fw-bold">
                    <i class="bi bi-heart-fill me-2"></i> تبرع الآن
                </a>
            </div>

        </div>
    </div>

    <!-- الجزء السفلي من الفوتر -->
    <div class="site-footer-bottom border-top border-secondary mt-5 py-4" style="background-color: #1e293b;">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">

                <div class="col-lg-6 col-12">
                    <p class="copyright-text mb-0 text-light small">
                        جميع الحقوق محفوظة © {{ date('Y') }} 
                        <a href="{{ url('/') }}" class="text-warning fw-bold">قلب طيب</a> للأعمال الخيرية
                        <br>
                        <span class="opacity-75">
                            التصميم والتطوير بكل حب 
                            <i class="bi bi-heart-fill text-danger"></i> 
                            بواسطة 
                            <a href="https://github.com/yourname" target="_blank" class="text-warning">فريق قلب طيب التقني</a>
                        </span>
                    </p>
                </div>

                <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                    <ul class="social-icon d-flex justify-content-center justify-content-lg-end gap-3 mb-0">
                        <li><a href="#" class="social-icon-link bi-twitter fs-4 text-light hover-yellow"></a></li>
                        <li><a href="#" class="social-icon-link bi-facebook fs-4 text-light hover-yellow"></a></li>
                        <li><a href="#" class="social-icon-link bi-instagram fs-4 text-light hover-yellow"></a></li>
                        <li><a href="#" class="social-icon-link bi-linkedin fs-4 text-light hover-yellow"></a></li>
                        <li><a href="#" class="social-icon-link bi-youtube fs-4 text-light hover-yellow"></a></li>
                        <li><a href="#" class="social-icon-link bi-whatsapp fs-4 text-light hover-yellow"></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

<!-- الأنماط الإضافية -->
<style>
    .site-footer-title {
        font-weight: 700;
        font-size: 1.25rem;
    }
    .underline {
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 3px;
        background: #fbbf24;
        border-radius: 2px;
    }
    .footer-menu-link, .site-footer-link {
        transition: all 0.3s ease;
        position: relative;
    }
    .hover-yellow:hover {
        color: #fbbf24 !important;
        padding-left: 8px;
    }
    .hover-scale {
        transition: transform 0.3s ease;
    }
    .hover-scale:hover {
        transform: translateY(-3px);
    }
    .hover-bg-yellow {
        transition: all 0.3s ease;
    }
    .hover-bg-yellow:hover {
        background-color: #fbbf24 !important;
        color: #1e293b !important;
    }
    .social-icon-link {
        transition: all 0.3s ease;
    }
    .social-icon-link:hover {
        transform: translateY(-3px) scale(1.2);
        color: #fbbf24 !important;
    }
</style>