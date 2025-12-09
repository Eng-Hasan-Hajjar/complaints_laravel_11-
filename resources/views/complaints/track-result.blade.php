@extends('layouts.guest')

@section('title', 'نتيجة تتبع الشكوى #' . $complaint->id)

@section('content')
<section class="py-5" dir="rtl">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- بطاقة الشكوى -->
                <div class="card shadow-lg border-0 rounded-4 mb-4">
                    <div class="card-header {{ $complaint->status_color }} text-white py-4 text-center">
                        <h2 class="mb-0">شكوى رقم #{{ $complaint->id }}</h2>
                        <p class="h4 mt-2">{{ $complaint->title }}</p>
                    </div>
                    <div class="card-body p-5">
                        <div class="row text-center text-md-start">
                            <div class="col-md-4 mb-3">
                                <small class="text-muted">الحالة</small>
                                <h5>
                                    <span class="badge bg-{{ $complaint->status_badge }} fs-6 px-4 py-2">
                                        {{ $complaint->status_text }}
                                    </span>
                                </h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <small class="text-muted">الأولوية</small>
                                <h5>
                                    <span class="badge bg-{{ $complaint->priority_badge }} fs-6 px-4 py-2">
                                        {{ $complaint->priority_text }}
                                    </span>
                                </h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <small class="text-muted">تاريخ التقديم</small>
                                <h5>{{ $complaint->created_at->format('Y/m/d h:i A') }}</h5>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-4">
                            <h5>القسم المختص</h5>
                            <p class="lead">{{ $complaint->department->name }}</p>
                        </div>

                        @if($complaint->category)
                        <div class="mb-4">
                            <h5>التصنيف</h5>
                            <p class="lead">{{ $complaint->category->name }}</p>
                        </div>
                        @endif

                        @if($complaint->comments->count() > 0)
                        <h5 class="mt-5 mb-3">سجل المتابعة</h5>
                        <div class="timeline">
                            @foreach($complaint->comments as $comment)
                            <div class="timeline-item mb-4">
                                <div class="d-flex">
                                    <div class="timeline-icon bg-primary text-white rounded-circle">
                                        <i class="bi bi-chat-left-text"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="fw-bold mb-1">{{ $comment->is_admin ? 'الإدارة' :  'أنت' }}</p>
                                        <p class="text-muted small">{{ $comment->created_at->diffForHumans() }}</p>
                                        <div class="bg-light p-3 rounded">
                                            {{ $comment->message }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i>
                            الشكوى قيد المراجعة حاليًا، سيتم الرد عليك خلال 48 ساعة
                        </div>
                        @endif

                        <div class="text-center mt-5">
                            <a href="{{ route('complaints.track.form') }}" class="btn btn-outline-primary rounded-pill px-5">
                                تتبع شكوى أخرى
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .timeline-item {
        position: relative;
    }
    .timeline-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        top: 50px;
        left: 19px;
        width: 2px;
        height: calc(100% - 50px);
        background: #dee2e6;
    }
    .timeline-item:last-child::before { display: none; }
</style>
@endpush