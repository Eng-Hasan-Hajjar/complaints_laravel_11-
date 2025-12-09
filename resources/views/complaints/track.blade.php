@extends('layouts.guest')

@section('title', 'تتبع الشكوى - جامعة الشهباء')

@section('content')
<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">
                        <i class="bi bi-search me-2"></i>
                        تتبع حالة الشكوى
                    </h3>
                    <p class="mb-0 mt-2 small opacity-90">أدخل رقم الشكوى الذي حصلت عليه عند التقديم</p>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('complaints.track') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">رقم الشكوى</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="text" name="complaint_id" class="form-control text-center fs-4"
                                       placeholder="مثال: 1423" required autofocus>
                            </div>
                            @error('complaint_id')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow">
                            <i class="bi bi-search me-2"></i>
                            تتبع الشكوى
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <small class="text-muted">
                            لا يتطلب تسجيل الدخول • سرية تامة
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection