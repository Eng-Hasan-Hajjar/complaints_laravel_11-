<x-guest-layout>

    <x-slot name="header">
        <h2 class="h4 fw-bold mb-0">نتيجة التتبع</h2>
        <p class="text-muted mb-0">شكوى رقم #{{ $complaint->id }}</p>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
              <div class="card-header {{ $complaint->status_color }} text-dark py-4 text-center">
    <div class="h4 fw-bold mb-1">شكوى رقم #{{ $complaint->id }}</div>
    <div class="h5 mb-0 opacity-75">{{ $complaint->title }}</div>
</div>


                <div class="card-body p-4 p-md-5">

                    <div class="row g-3 mb-4 text-center">
                        <div class="col-md-4">
                            <div class="border rounded-4 p-3 bg-light">
                                <div class="text-muted small mb-1">الحالة</div>
                                <span class="badge bg-{{ $complaint->status_badge }} px-4 py-2 fs-6">
                                    {{ $complaint->status_text }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded-4 p-3 bg-light">
                                <div class="text-muted small mb-1">الأولوية</div>
                                <span class="badge bg-{{ $complaint->priority_badge }} px-4 py-2 fs-6">
                                    {{ $complaint->priority_text }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded-4 p-3 bg-light">
                                <div class="text-muted small mb-1">تاريخ التقديم</div>
                                <div class="fw-bold">{{ $complaint->created_at->format('Y/m/d h:i A') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="border rounded-4 p-3">
                            <div class="fw-bold mb-2"><i class="bi bi-building"></i> القسم المختص</div>
                            <div class="text-muted">{{ $complaint->department->name }}</div>

                            @if($complaint->category)
                                <hr>
                                <div class="fw-bold mb-2"><i class="bi bi-tags"></i> التصنيف</div>
                                <div class="text-muted">{{ $complaint->category->name }}</div>
                            @endif
                        </div>
                    </div>

                    {{-- Timeline --}}
                    <div class="mb-2 fw-bold"><i class="bi bi-clock-history"></i> سجل المتابعة</div>

                    @if($complaint->comments->count())
                        <div class="list-group rounded-4 overflow-hidden">
                            @foreach($complaint->comments as $comment)
                                <div class="list-group-item p-4">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="fw-bold">
                                            <i class="bi bi-chat-dots"></i>
                                            {{ $comment->is_admin ? 'الإدارة' : 'أنت' }}
                                        </div>
                                        <div class="text-muted small">{{ $comment->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="mt-2 text-muted" style="line-height:1.9">
                                        {{ $comment->message }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info rounded-4 py-4 text-center">
                            <i class="bi bi-hourglass-split"></i>
                            لا يوجد ردود حتى الآن — سيتم الرد خلال 48 ساعة.
                        </div>
                    @endif

                    <div class="d-flex justify-content-center gap-2 flex-wrap mt-4">
                        <a href="{{ route('complaints.track.form') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-arrow-repeat"></i> تتبع شكوى أخرى
                        </a>
                        <a href="{{ route('main_home') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-globe"></i> العودة للموقع
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-guest-layout>
