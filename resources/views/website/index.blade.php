<!doctype html>
<html lang="ar" dir="rtl">

    @include('website.layouts.head')
   
    
    <body id="section_1" class="text-end">


         @include('website.layouts.header')
   

         
         @include('website.layouts.navbar')


        <main>



<!-- ======= Hero Section - جامعة الشهباء ======= -->
<section class="hero-university position-relative overflow-hidden" style="min-height: 0vh; direction: rtl;">
    


    <div class="container position-relative z-10 h-50">
        <div class="row align-items-center justify-content-center h-50">
            <div class="col-lg-10 col-xl-8 text-center text-white">

       <br>
       <br>
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


</section>


















<!-- ======= القسم الترحيبي + خدمات سريعة ======= -->
<section class="section-padding bg-light" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                <h2 class="display-5 fw-bold text-primary mb-4">
                    نظام الشكاوى والاقتراحات الإلكتروني
                </h2>
                <p class="lead text-muted fs-5">
                    جامعة الشهباء الخاصة – حلب، سوريا
                </p>
                <p class="text-secondary mt-3">
                    صوتك يُسمع.. نحن هنا من أجل تحسين تجربتك الجامعية
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- تقديم شكوى جديدة -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="featured-block text-center p-4 rounded-4 shadow-sm border hover-lift h-100">
                    <a href="{{ route('complaints.create') }}" class="text-decoration-none">
                        <div class="icon-circle bg-primary text-white mb-3 mx-auto">
                            <i class="bi bi-file-earmark-text-fill fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-dark">تقديم شكوى جديدة</h5>
                        <p class="text-muted small">إدارية · أكاديمية · خدمات طلابية</p>
                    </a>
                </div>
            </div>

            <!-- تتبع الشكوى -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="featured-block text-center p-4 rounded-4 shadow-sm border hover-lift h-100">
                    <a href="{{ route('complaints.track') }}" class="text-decoration-none">
                        <div class="icon-circle bg-success text-white mb-3 mx-auto">
                            <i class="bi bi-search fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-dark">تتبع شكواك</h5>
                        <p class="text-muted small">ادخل رقم الشكوى وتابع حالتها لحظيًا</p>
                    </a>
                </div>
            </div>

            <!-- شكاواي السابقة -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="featured-block text-center p-4 rounded-4 shadow-sm border hover-lift h-100">
                    @auth
                        <a href="{{ route('complaints.index') }}" class="text-decoration-none">
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none">
                    @endauth
                        <div class="icon-circle bg-warning text-white mb-3 mx-auto">
                            <i class="bi bi-clock-history fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-dark">شكاواي السابقة</h5>
                        <p class="text-muted small">عرض جميع الشكاوى والردود الرسمية</p>
                    </a>
                </div>
            </div>

            <!-- تواصل معنا مباشرة -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="featured-block text-center p-4 rounded-4 shadow-sm border hover-lift h-100">
                    <a href="#contact" class="text-decoration-none smooth-scroll">
                        <div class="icon-circle bg-info text-white mb-3 mx-auto">
                            <i class="bi bi-headset fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-dark">تواصل معنا</h5>
                        <p class="text-muted small">دعم فوري عبر الواتساب أو الهاتف</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ======= قسم "من نحن" – مخصص للجامعة ======= -->
<!-- ======= قسم "نبذة عن النظام" – جامعة الشهباء ======= -->
<section class="section-padding section-bg" id="section_2" dir="rtl">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- الصورة على اليسار (تظهر أولاً في RTL) -->
            <div class="col-lg-6 col-12 order-lg-2 text-center text-lg-end">
                <img src="{{ asset('website/images/bg1.jpg') }}"
                     class="img-fluid rounded-4 shadow-lg w-100"
                     style="max-height: 500px; object-fit: cover;"
                     alt="جامعة الشهباء الخاصة - حلب">
            </div>

            <!-- النص على اليمين -->
            <div class="col-lg-6 col-12 order-lg-1"style="text-align:right">
                <div class="custom-text-box bg-white rounded-4 shadow p-4 p-md-5 h-100 d-flex flex-column justify-content-center">

                    <h4 class="display-5 fw-bold text-primary mb-3 justify-content-right" dir="rtl" style="text-align:right">
                        نظام الشكاوى والاقتراحات 
                    </h4>

                    <h5 class="text-secondary mb-4 fw-medium">
                        جامعة الشهباء الخاصة – حلب، سوريا | منذ 2008
                    </h5>

                    <p class="text-muted lh-lg fs-5 mb-4">
                        نحن في جامعة الشهباء نؤمن أن <strong class="text-primary">صوت الطالب هو أساس التحسين</strong>.<br>
                        لذلك أطلقنا هذا النظام الإلكتروني الحديث ليتمكّن كل فرد من أسرة الجامعة – طالبًا كان أم عضو هيئة تدريسية أم موظفًا – من تقديم شكواه أو اقتراحه بكل <strong>سهولة، سرية، وشفافية</strong>.
                    </p>

                    <div class="row g-3 mb-5">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-shield-check text-success fs-3 ms-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">سرية تامة</h6>
                                    <small class="text-muted">هويتك محمية 100%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock-history text-info fs-3 ms-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">متابعة لحظية</h6>
                                    <small class="text-muted">تعرف على حالة شكواك فورًا</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-reply-all-fill text-warning fs-3 ms-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">رد رسمي خلال 48 ساعة</h6>
                                    <small class="text-muted">من الإدارة المختصة مباشرة</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-bar-chart-line-fill text-primary fs-3 ms-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold">تقارير شفافة</h6>
                                    <small class="text-muted">نشر شهري لأكثر المشكلات شيوعًا</small>
                                </div>
                            </div>
                        </div>
                    </div>

   

                </div>
            </div>

        </div>
    </div>
</section>



<!-- أنماط إضافية لتحسين الشكل -->
<style>
    .featured-block {
        transition: all 0.3s ease;
        background: #fff;
    }
    .featured-block:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    .icon-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hover-lift {
        transition: transform 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
    }
    .section-bg {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

        .section-bg {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    .hover-lift {
        transition: all 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    .custom-text-box {
        min-height: 100%;
        border-right: 5px solid #0d6efd;
    }
    @media (max-width: 991px) {
        .order-lg-2 { order: 1; }
        .order-lg-1 { order: 2; }
        .custom-text-box { border-right: none; border-bottom: 5px solid #0d6efd; }
    }


</style>












            </section>

        </main>
        @include('website.layouts.footer')


        @include('website.layouts.script')


    </body>
</html>