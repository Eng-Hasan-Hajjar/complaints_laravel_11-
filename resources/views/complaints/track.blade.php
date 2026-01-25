<x-guest-layout>

    <x-slot name="header">
        <h2 class="h4 fw-bold mb-0">تتبع الشكوى</h2>
        <p class="text-muted mb-0">أدخل رقم الشكوى لمشاهدة الحالة وسجل المتابعة.</p>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small opacity-75">UCMS • Complaint Tracking</div>
                            <div class="h5 fw-bold mb-0">تتبّع حالة الشكوى</div>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-3 p-3">
                            <i class="bi bi-search fs-4"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('complaints.track') }}" method="POST">
                        @csrf

                        <label class="form-label fw-bold">رقم الشكوى</label>

                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-hash"></i>
                            </span>

                            <input type="text"
                                   name="complaint_id"
                                   value="{{ old('complaint_id') }}"
                                   class="form-control text-center fw-bold @error('complaint_id') is-invalid @enderror"
                                   placeholder="مثال: 1423"
                                   inputmode="numeric"
                                   required autofocus>
                        </div>

                        @error('complaint_id')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror

                        <div class="form-text mt-3">
                            <i class="bi bi-lightbulb text-warning"></i>
                            اكتب الرقم كما هو تماماً (أرقام فقط). إذا ضاع الرقم تواصل مع الدعم.
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-4 rounded-pill">
                            <i class="bi bi-search me-1"></i>
                            تتبّع الآن
                        </button>

                        <div class="d-flex justify-content-between align-items-center mt-4 small text-muted">
                            <span><i class="bi bi-shield-lock"></i> تتبع آمن • بدون تسجيل دخول</span>
                            <a href="{{ route('main_home') }}" class="text-decoration-none">
                                <i class="bi bi-globe"></i> العودة للموقع
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>
