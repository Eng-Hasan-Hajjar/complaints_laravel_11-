@extends('admin.layouts.app')

@section('title', 'لوحة الطالب')

@section('content')
<div class="row g-3">

    {{-- Card: Create Complaint --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="mb-2"><i class="fas fa-plus-circle text-primary me-2"></i> إنشاء شكوى</h5>
                <p class="text-muted mb-3">قدّم شكوى جديدة إلى القسم المختص في الجامعة.</p>
                <a href="{{ route('complaints.create') }}" class="btn btn-primary w-100">
                    <i class="fas fa-pen me-1"></i> إنشاء شكوى جديدة
                </a>
            </div>
        </div>
    </div>

    {{-- Card: Track My Complaints --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0"><i class="fas fa-route text-success me-2"></i> تتبّع شكواي</h5>
                    <a href="{{ route('complaints.index') }}" class="btn btn-sm btn-outline-secondary">
                        عرض الكل
                    </a>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <div class="small text-muted">المجموع</div>
                            <div class="fw-bold">{{ $stats['total'] }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <div class="small text-muted">قيد الانتظار</div>
                            <div class="fw-bold">{{ $stats['pending'] }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <div class="small text-muted">قيد المراجعة</div>
                            <div class="fw-bold">{{ $stats['in_review'] }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <div class="small text-muted">تم الحل</div>
                            <div class="fw-bold">{{ $stats['resolved'] }}</div>
                        </div>
                    </div>
                </div>

                @if($myComplaints->count())
                    <div class="table-responsive">
                        <table class="table table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>الحالة</th>
                                    <th class="text-end">إجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myComplaints as $c)
                                <tr>
                                    <td>#{{ $c->id }}</td>
                                    <td class="text-truncate" style="max-width: 320px;">
                                        {{ $c->title }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $c->status=='pending'?'warning':($c->status=='in_review'?'info':($c->status=='resolved'?'success':'secondary')) }}">
                                            {{ $c->status }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('complaints.show', $c) }}" class="btn btn-sm btn-outline-primary">
                                            عرض
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        لا توجد شكاوى بعد. يمكنك إنشاء شكوى جديدة من الزر على اليسار.
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Card: Notifications --}}
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">
                        <i class="fas fa-bell text-warning me-2"></i> الإشعارات
                        @if($unreadCount)
                            <span class="badge bg-danger ms-2">{{ $unreadCount }}</span>
                        @endif
                    </h5>

                    <div class="d-flex gap-2">
                        <a href="{{ route('notifications.index') }}" class="btn btn-sm btn-outline-secondary">عرض الكل</a>

                        <form action="{{ route('notifications.readAll') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-success" type="submit">
                                تمييز الكل كمقروء
                            </button>
                        </form>
                    </div>
                </div>

                @if($notifications->count())
                    <div class="list-group">
                        @foreach($notifications as $n)
                            <div class="list-group-item d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="{{ $n->read_at ? 'text-muted' : 'fw-bold' }}">
                                        {{ $n->message }}
                                    </div>
                                    <small class="text-muted">{{ $n->created_at->diffForHumans() }}</small>
                                </div>

                                <div class="d-flex gap-2">
                                    @if($n->complaint_id)
                                        <a href="{{ route('complaints.show', $n->complaint_id) }}" class="btn btn-sm btn-outline-primary">
                                            الشكوى
                                        </a>
                                    @endif

                                    @if(is_null($n->read_at))
                                        <form action="{{ route('notifications.read', $n) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-success" type="submit">مقروء</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-light mb-0">لا توجد إشعارات حالياً.</div>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection
