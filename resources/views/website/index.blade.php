<!doctype html>
<html lang="ar" dir="rtl">

    @include('website.layouts.head')
   
    
    <body id="section_1" class="text-end">


         @include('website.layouts.header')
   

         
         @include('website.layouts.navbar')


        <main>
<style>

</style>
  




<!-- ======= Hero Section - جامعة الشهباء ======= -->
<section class="hero-university position-relative overflow-hidden" style="min-height: 100vh;">
    
    <!-- خلفية فيديو أو صورة ديناميكية (اختياري) -->
    <div class="hero-bg">
        <div class="overlay"></div>
        <img src="" 
             alt="جامعة الشهباء" 
             class="hero-bg-image">
    </div>

    <div class="container position-relative z-10 h-50">
        <div class="row align-items-center justify-content-center h-50">
            <div class="col-lg-10 col-xl-8 text-center text-white">

                <!-- شعار الجامعة (اختياري) -->
                <div class="university-logo mb-4">
                    <img src="{{ asset('website/images/logo.png') }}" 
                         alt="جامعة الشهباء" 
                         class="img-fluid" 
                         style="max-height: 120px; filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.21));">
                </div>

                <h1 class="display-4 fw-bold mb-4 lh-base">
                    نظام الشكاوى والاقتراحات
                    <br>
                    <span class="text-warning">جامعة الشهباء الخاصة</span>
                </h1>

                <p class="lead fs-4 mb-5 opacity-90">
                    صوتك مهم.. نحن نسمعك<br>
                    منصة إلكترونية آمنة وسرية لتقديم شكاواك واقتراحاتك بكل سهولة وشفافية
                </p>

                <!-- أزرار الإجراء السريع -->
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">

                    @auth
                        <a href="{{ route('complaints.create') }}" 
                           class="btn btn-warning btn-lg px-5 py-3 rounded-pill shadow-lg fw-bold d-flex align-items-center gap-2 hover-lift">
                            <i class="bi bi-plus-circle-fill fs-4"></i>
                            تقديم شكوى جديدة
                        </a>
                        <a href="{{ route('complaints.index') }}" 
                           class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill shadow hover-lift">
                            <i class="bi bi-list-check"></i>
                            شكاواي السابقة
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg fw-bold hover-lift">
                            <i class="bi bi-box-arrow-in-right"></i>
                              تقديم شكوى
                        </a>
                    @endauth

                </div>

                <!-- إحصائيات سريعة (اختياري، يمكن جلبها من قاعدة البيانات لاحقًا) -->
                <div class="row mt-5 g-4 justify-content-center">
                    <div class="col-6 col-md-3">
                        <div class="text-center">
                            <h3 class="fw-bold text-warning mb-1">98%</h3>
                            <p class="small opacity-80">نسبة الرد خلال 48 ساعة</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-center">
                            <h3 class="fw-bold text-warning mb-1">4.9/5</h3>
                            <p class="small opacity-80">تقييم رضا الطلاب</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-center">
                            <h3 class="fw-bold text-warning mb-1">100%</h3>
                            <p class="small opacity-80">سرية تامة مضمونة</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- موجة سفلية أنيقة -->
    <div class="wave-bottom">
        <svg viewBox="0 0 1440 180" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,90 C360,180 1080,0 1440,90 L1440,180 L0,180 Z" fill="#ffffff"></path>
        </svg>
    </div>
</section>









            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-12 text-center mx-auto">
                            <h2 class="mb-5">مرحبًا بكم في منظمة قلب طيب الخيرية</h2>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="donate.html" class="d-block">
                                    <img src="{{ asset('website/images/icons/hands.png') }}" class="featured-block-image img-fluid" alt="">
                                    <p class="featured-block-text">كن <strong>متطوعًا</strong></p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="donate.html" class="d-block">
                                    <img src="{{ asset('website/images/icons/heart.png') }}" class="featured-block-image img-fluid" alt="">
                                    <p class="featured-block-text"><strong>رعاية</strong> الأرض</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="donate.html" class="d-block">
                                    <img src="{{ asset('website/images/icons/receive.png') }}" class="featured-block-image img-fluid" alt="">
                                    <p class="featured-block-text">قم بـ <strong>تبرع</strong></p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="donate.html" class="d-block">
                                    <img src="{{ asset('website/images/icons/scholarship.png') }}" class="featured-block-image img-fluid" alt="">
                                    <p class="featured-block-text">برنامج <strong>المنح الدراسية</strong></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="section-padding section-bg" id="section_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <img src="{{ asset('website/images/group-people-volunteering-foodbank-poor-people.jpg') }}" class="custom-text-box-image img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="custom-text-box">
                                <h2 class="mb-2">قصتنا</h2>
                                <h5 class="mb-3">قلب طيب - منظمة خيرية غير ربحية</h5>
                                <p class="mb-0">هذا قالب مجاني بتقنية Bootstrap 5.2.2 لمواقع المنظمات الخيرية. يمكنك استخدامه بحرية. نشكرك على مشاركة موقع TemplateMo مع أصدقائك.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        @include('website.layouts.footer')


        @include('website.layouts.script')


    </body>
</html>